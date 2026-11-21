<?php

namespace App\Http\Controllers;

use App\Models\DailyProgramAnswer;
use App\Models\PrayerRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\TeacherProfile;
use App\Models\StudentProfile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $today = now()->toDateString();

        $studentsCount = \App\Models\StudentProfile::count();
        $teachersCount = \App\Models\TeacherProfile::count();

        $todayRecords = DailyProgramAnswer::whereDate('date', $today)->get();
        $todayPoints  = $todayRecords->sum('points');

        $topStudents = DailyProgramAnswer::select('student_id')
            ->selectRaw('SUM(points) as total_points')
            ->groupBy('student_id')
            ->havingRaw('SUM(points) > 0')
            ->orderByDesc('total_points')
            ->take(5)
            ->get();



        $weekStart = now()->subDays(6)->toDateString();
        $weekRecords = DailyProgramAnswer::whereBetween('date', [$weekStart, $today])->get();
        $weeklyPoints = $weekRecords->sum('points');

        $monthStart = now()->subDays(29)->toDateString();
        $monthRecords = DailyProgramAnswer::whereBetween('date', [$monthStart, $today])->get();
        $monthlyPoints = $monthRecords->sum('points');

        return view('admin.dashboard', [
            'studentsCount' => $studentsCount,
            'teachersCount' => $teachersCount,
            'todayRecords'  => $todayRecords->count(),
            'todayPoints'   => $todayPoints,
            'topStudents'   => $topStudents,
            'weeklyPoints'  => $weeklyPoints,
            'monthlyPoints' => $monthlyPoints,
        ]);
    }


    public function createUserForm()
    {

        $teachers = TeacherProfile::with('user')->get();
        return view('admin.create-user', compact('teachers'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'role' => 'required|in:teacher,student',
        ], [
            'name.required' => 'الاسم مطلوب.',
            'username.required' => 'اسم المستخدم مطلوب.',
            'username.unique' => 'اسم المستخدم مستخدم من قبل.',
            'password.required' => 'كلمة المرور مطلوبة.',
            'password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل.',
            'role.required' => 'يجب اختيار نوع الحساب.',
        ]);

        $password = Str::password(6, letters: true, numbers: true, symbols: false, spaces: false);
        $password = Str::lower($password);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($password),
            'role' => $request->role,
        ]);

        if ($request->role === 'teacher') {
            TeacherProfile::create([
                'user_id' => $user->id,
            ]);
        } else {
            StudentProfile::create([
                'user_id' => $user->id,
                'teacher_id' => $request->teacher_id,
            ]);
        }

        return view('admin.show-password', [
            'username' => $request->username,
            'password' => $password,
        ]);
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'teacher') {
            TeacherProfile::where('user_id', $user->id)->delete();
        } else {
            StudentProfile::where('user_id', $user->id)->delete();
        }

        $user->delete();

        return back()->with('success', 'تم حذف المستخدم بنجاح');
    }

    public function listTeachers()
    {
        $teachers = TeacherProfile::with('user')
            ->withCount('students')
            ->get();

        return view('admin.teachers', compact('teachers'));
    }

    public function listStudents()
    {
        $weekStart = now()->startOfWeek(Carbon::SATURDAY)->toDateString();
        $weekEnd   = now()->endOfWeek(Carbon::FRIDAY)->toDateString();

        $students = StudentProfile::with('user', 'teacher.user')->get();
        $studentsIds = $students->pluck('id');

        $weeklyPointsByStudent = DailyProgramAnswer::whereIn('student_id', $studentsIds)
            ->whereDate('date', '>=', $weekStart)
            ->whereDate('date', '<=', $weekEnd)
            ->selectRaw('student_id, SUM(points) as total_points')
            ->groupBy('student_id')
            ->pluck('total_points', 'student_id');

        $students->each(function ($student) use ($weeklyPointsByStudent) {
            $student->weeklyPoints = (int) ($weeklyPointsByStudent[$student->id] ?? 0);
        });

        return view('admin.students', compact('students'));
    }

    public function showTeacher($id)
    {
        $teacher = TeacherProfile::with('user')
            ->with('students.user')
            ->findOrFail($id);

        return view('admin.show-teacher', compact('teacher'));
    }

    private function buildFullSummary($records)
    {
        $summary = [];

        foreach ($records as $rec) {
            $qid = $rec->question_id;
            $answerText = trim((string) $rec->answer_text);
            $key = $qid . '_' . $answerText;

            if (!isset($summary[$key])) {
                $summary[$key] = [
                    'question_id' => $qid,
                    'answer_text' => $rec->answer_text,
                    'points'      => (int) $rec->points,
                    'count'       => 1,
                ];
            } else {
                $summary[$key]['count']++;
                $summary[$key]['points'] += (int) $rec->points;
            }
        }

        return array_values($summary);
    }

    public function showStudent($id)
    {
        $student = StudentProfile::with('user', 'teacher.user')->findOrFail($id);
        $teacherId = $student->teacher_id;

        if ($teacherId == 1) {
            $questionNames = [
                'm1'  => 'صلاة الفجر',
                'm2'  => 'صلاة الظهر',
                'm3'  => 'صلاة العصر',
                'm4'  => 'صلاة المغرب',
                'm5'  => 'صلاة العشاء',
                'm6'  => 'سنة الفجر',
                'm7'  => 'سنة الظهر القبلية',
                'm8'  => 'سنة الظهر البعدية',
                'm9'  => 'سنة العصر',
                'm10' => 'سنة المغرب',
                'm11' => 'سنة العشاء',
                'm12' => 'حفظ القرآن الكريم',
                'm13' => 'بر الوالدين',
                'm14' => 'ساعات الدراسة',
                'm15' => 'عمل منزلي',
                'm16' => 'وقت النوم',
            ];
        } else {
            $questionNames = [
                't1'  => 'صلاة الفجر',
                't2'  => 'صلاة الظهر',
                't3'  => 'صلاة العصر',
                't4'  => 'صلاة المغرب',
                't5'  => 'صلاة العشاء',
                't6'  => 'سنة الفجر',
                't7'  => 'سنة الظهر القبلية',
                't8'  => 'سنة الظهر البعدية',
                't9'  => 'سنة العصر',
                't10' => 'سنة المغرب',
                't11' => 'سنة العشاء',
                't12' => 'الضحى',
                't13' => 'الأوابين',
                't14' => 'قيام الليل',
                't15' => 'الوتر',
                't16' => 'تهجد',
                't17' => 'تلاوة القرآن',
                't18' => 'حفظ القرآن',
                't19' => 'بر الوالدين',
                't20' => 'الورد الصباحي',
                't21' => 'الورد المسائي',
                't22' => 'ساعات الدراسة',
                't23' => 'قراءة للجامعيات',
                't24' => 'عمل منزلي',
                't25' => 'سورة الملك',
                't26' => 'سورة الواقعة',
            ];
        }

        $today = now()->toDateString();
        $weekStart = now()->subDays(6)->toDateString();
        $monthStart = now()->subDays(29)->toDateString();

        $records = DailyProgramAnswer::where('student_id', $id)
            ->orderByDesc('date')
            ->get();

        $todayPoints = $records->where('date', $today)->sum('points');

        $weekly = $records->filter(function ($rec) use ($weekStart, $today) {
            return $rec->date >= $weekStart && $rec->date <= $today;
        });

        $weeklyPoints = $weekly->sum('points');

        $monthlyPoints = $records->filter(function ($rec) use ($monthStart, $today) {
            return $rec->date >= $monthStart && $rec->date <= $today;
        })->sum('points');

        foreach ($weekly as $rec) {
            $qid = $rec->question_id;
            if (!isset($questionNames[$qid])) {
                $questionNames[$qid] = optional($rec->question)->title
                    ?? optional($rec->question)->question
                    ?? optional($rec->question)->name
                    ?? ('البند #' . $qid);
            }
        }

        $weeklySummary = $this->buildFullSummary($weekly);

        return view('admin.show-student', compact(
            'student',
            'todayPoints',
            'weeklyPoints',
            'monthlyPoints',
            'records',
            'weeklySummary',
            'questionNames'
        ));
    }
}
