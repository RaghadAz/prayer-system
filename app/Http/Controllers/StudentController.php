<?php

namespace App\Http\Controllers;

use App\Models\PrayerRecord;
use App\Models\StudentProfile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
        ]);
        $password = 'student123';
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => null,
            'role' => 'student',
            'password' => Hash::make($password),
        ]);

        StudentProfile::create([
            'user_id' => $user->id,
            'teacher_id' => auth::user()->teacher_id,
        ]);

        return response()->json([
            'message' => 'Student created successfully',
            'username' => $user->username,
            'password' => $password,
        ]);
    }

    public function studentView($student_id)
    {
        $student = StudentProfile::with('user')->find($student_id);

        if (!$student) {
            return response()->json([
                'message' => 'Student not found',
                'data' => []
            ]);
        }

        $today = now()->toDateString();

        $todayRecords = PrayerRecord::where('student_id', $student_id)
            ->where('date', $today)
            ->get();

        $weekStart = now()->isSaturday()
            ? now()->toDateString()
            : now()->previous(Carbon::SATURDAY)->toDateString();

        $weekEnd = now()->toDateString();
        $weeklyRecords = PrayerRecord::where('student_id', $student_id)
            ->where('date', [$weekStart, $weekEnd])
            ->get();

        $totalPoints = PrayerRecord::where('student_id', $student_id)->sum('points');
        $totalPoints ?? 0;

        $weeklyPoints = $weeklyRecords->sum('points') ?? 0;

        $todayPoints = $todayRecords->sum('points') ?? 0;
        $teacherId = auth::user()->teacher_id;
        $studentIdsInGroup = StudentProfile::where('teacher_id', $teacherId)->pluck('id');

        $ranking = PrayerRecord::select('student_id', $studentIdsInGroup)
            ->selectRaw('SUM(points) as total_points')
            ->groupBy('student_id')
            ->havingRaw('SUM(points) > 0')
            ->orderByDesc('total_points')
            ->get();

        $rank = $ranking->search(function ($item) use ($student_id) {
            return $item->student_id == $student_id;
        });
        $ranking = PrayerRecord::select('student_id')
            ->selectRaw('SUM(points) as total_points')
            ->groupBy('student_id')
            ->havingRaw('SUM(points) > 0')
            ->orderByDesc('total_points')
            ->pluck('student_id')
            ->toArray();

        $position = array_search($student_id, $ranking);
        $rank = $position !== false ? $position + 1 : null;

        return response()->json([
            'message' => 'Student prayer view',
            'student' => [
                'id' => $student->id,
                'name' => $student->user->name,
                'rank' => $rank,
                'total_points' => $totalPoints,
                'weekly_points' => $weeklyPoints,
                'todayPoints' => $todayPoints,
            ],
            'today_records' => $todayRecords,
            'weekly_records' => $weeklyRecords,
        ]);
    }
    public function dashboard()
    {
        $student = auth::user()->studentProfile;

        $todayPoints = $student->prayerRecords()
            ->where('date', now()->toDateString())
            ->sum('points') ?? 0;

        $weekPoints = $student->prayerRecords()
            ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('points') ?? 0;

        $monthPoints = $student->prayerRecords()
            ->whereMonth('date', now()->month)
            ->sum('points') ?? 0;

        $ranking = StudentProfile::where('teacher_id', $student->teacher_id)
            ->withSum('prayerRecords as total_points', 'points')
            ->get()
            ->sortByDesc(function ($item) {
                return $item->total_points ?? 0;
            })
            ->pluck('id')
            ->search($student->id);

        $ranking = $ranking !== false ? $ranking + 1 : '—';

        $date = request()->input('week_date')
            ? Carbon::parse(request()->input('week_date'))
            : Carbon::now();

        $weekStart = $date->copy()->startOfWeek(Carbon::SATURDAY);
        $weekEnd   = $date->copy()->endOfWeek(Carbon::SATURDAY);
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $topThree = StudentProfile::where('teacher_id', $student->teacher_id)
            ->with('user')
            ->withSum(['prayerRecords as total_points' => function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('date', [$startOfMonth, $endOfMonth]);
            }], 'points')
            ->get()
            ->map(function ($student) {
                $student->total_points = $student->total_points ?? 0;
                return $student;
            })
            ->sortByDesc('total_points')
            ->values()
            ->take(3);

        return view('student.dashboard', compact(
            'student',
            'todayPoints',
            'weekPoints',
            'monthPoints',
            'ranking',
            'topThree'
        ));
    }

    public function dailyProgram()
    {
        $student = Auth::user()->studentProfile;

        $teacherId = $student ? $student->teacher_id : 1;

        return view('student.daily-program', compact('student', 'teacherId'));
    }

    public function saveDailyProgram(Request $request)
    {
        $student = Auth::user()->studentProfile;

        $type = $request->has_excuse ? 'dhikr' : 'prayer';

        PrayerRecord::updateOrCreate(
            [
                'student_id' => $student->id,
                'date' => now()->toDateString(),
            ],
            [
                'type' => $type,
                'fajr_option' => $request->fajr_option,
                'dhuhr_option' => $request->dhuhr_option,
                'asr_option' => $request->asr_option,
                'maghrib_option' => $request->maghrib_option,
                'isha_option' => $request->isha_option,
            ]
        );

        return back()->with('success', 'تم حفظ البرنامج اليومي بنجاح');
    }
}
