<?php

namespace App\Http\Controllers;

use App\Models\PrayerRecord;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'username'=>'required|string|max:255|unique:users,username',
        ]);
     $password='student123';
     $user=User::create([
        'name'=>$request->name,
        'username'=>$request->username,
        'email'=>null,
        'role'=>'student',
        'password'=> Hash::make($password),
        ]);

        StudentProfile::create([
            'user_id' => $user->id,
            'teacher_id' => $request->teacher_id,
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

        $weekStart = now()->subDays(6)->toDateString();
        $weeklyRecords = PrayerRecord::where('student_id', $student_id)
            ->where('date', '>=', $weekStart)
            ->get();

        $totalPoints = PrayerRecord::where('student_id', $student_id)->sum('points');

        $weeklyPoints = $weeklyRecords->sum('points');

        $ranking = PrayerRecord::select('student_id')
            ->selectRaw('SUM(points) as total_points')
            ->groupBy('student_id')
            ->orderByDesc('total_points')
            ->get();

        $rank = $ranking->search(function ($item) use ($student_id) {
            return $item->student_id == $student_id;
        }) + 1;

        return response()->json([
            'message' => 'Student prayer view',
            'student' => [
                'id' => $student->id,
                'name' => $student->user->name,
                'rank' => $rank,
                'total_points' => $totalPoints,
                'weekly_points' => $weeklyPoints,
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
        ->sum('points');

    $weekPoints = $student->prayerRecords()
        ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
        ->sum('points');

    $monthPoints = $student->prayerRecords()
        ->whereMonth('date', now()->month)
        ->sum('points');

    $ranking = StudentProfile::withSum('prayerRecords as total_points', 'points')
        ->orderByDesc('total_points')
        ->get()
        ->pluck('id')
        ->search($student->id) + 1;

    $topThree = StudentProfile::with('user')
        ->withSum('prayerRecords as total_points', 'points')
        ->orderByDesc('total_points')
        ->take(3)
        ->get();

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
    return view('student.daily-program');
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


