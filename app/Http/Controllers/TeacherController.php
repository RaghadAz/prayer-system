<?php

namespace App\Http\Controllers;

use App\Models\DailyProgramAnswer;
use App\Models\PrayerRecord;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TeacherProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function store(Request $request){
       $request->validate([
        'name'=> 'required|string|max:255',
        'username'=> 'required|string|max:255|unique:users,username',
       ]);
       $password = 'teacher123';
         $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => null,
        'role' => 'teacher',
        'password' => Hash::make($password),
    ]);

    TeacherProfile::create([
        'user_id'=>$user->id,
    ]);

    return response()->json([
    'message'=>'Teacher created successfully',
    'username'=>$user->username,
    'password'=>$password,

    ]);
    }
public function teacherStudentsResults($teacher_id)
{
    $students = \App\Models\StudentProfile::where('teacher_id', $teacher_id)
        ->with('user')
        ->get();

    if ($students->isEmpty()) {
        return response()->json([
            'message' => 'No students found for this teacher',
            'data' => []
        ]);
    }

    $records = PrayerRecord::where('teacher_id', $teacher_id)->get();

    $ranking = $records
        ->groupBy('student_id')
        ->map(fn($r) => $r->sum('points'))
        ->sortDesc();

    $studentsData = $students->map(function ($student) use ($ranking) {
        $totalPoints = $ranking[$student->id] ?? 0;

        return [
            'student_id'   => $student->id,
            'student_name' => $student->user->name ?? 'Unknown',
            'total_points' => $totalPoints,
        ];
    });

    $studentsData = $studentsData->sortByDesc('total_points')->values();

    return response()->json([
        'message' => 'Teacher students prayer results',
        'teacher_id' => $teacher_id,
        'students' => $studentsData
    ]);
}
public function teacherWeeklyPerformance($teacher_id)
{
    $weekStart = now()->subDays(6)->toDateString();
    $today = now()->toDateString();

    $students = \App\Models\StudentProfile::where('teacher_id', $teacher_id)
        ->with('user')
        ->get();

    if ($students->isEmpty()) {
        return response()->json([
            'message' => 'No students found for this teacher',
            'data' => []
        ]);
    }

    $weeklyRecords = PrayerRecord::where('teacher_id', $teacher_id)
        ->whereBetween('date', [$weekStart, $today])
        ->get();

    $weeklyRanking = $weeklyRecords
        ->groupBy('student_id')
        ->map(fn($r) => [
            'weekly_points' => $r->sum('points'),
            'weekly_prayers' => $r->count(),
        ])
        ->sortByDesc('weekly_points');

    $studentsData = $students->map(function ($student) use ($weeklyRanking) {

        $weeklyData = $weeklyRanking[$student->id] ?? [
            'weekly_points' => 0,
            'weekly_prayers' => 0,
        ];

        return [
            'student_id'     => $student->id,
            'student_name'   => $student->user->name ?? 'Unknown',
            'weekly_points'  => $weeklyData['weekly_points'],
            'weekly_prayers' => $weeklyData['weekly_prayers'],
        ];
    });

    $studentsData = $studentsData->sortByDesc('weekly_points')->values();

    return response()->json([
        'message' => 'Teacher weekly performance for students',
        'teacher_id' => $teacher_id,
        'week_range' => [
            'from' => $weekStart,
            'to'   => $today,
        ],
        'students' => $studentsData
    ]);
}

public function dashboard()
{
    $teacher = Auth::user()->teacherProfile;

    $studentsIds = $teacher->students()->pluck('id');

    $todayPoints = DailyProgramAnswer::whereIn('student_id', $studentsIds)
        ->whereDate('date', now())
        ->sum('points');

    $weekStart = now()->startOfWeek();
    $weekEnd   = now()->endOfWeek();

    $weeklyPoints = DailyProgramAnswer::whereIn('student_id', $studentsIds)
        ->whereDate('date', '>=', $weekStart)
        ->whereDate('date', '<=', $weekEnd)
        ->sum('points');

    $monthlyPoints = DailyProgramAnswer::whereIn('student_id', $studentsIds)
        ->whereMonth('date', now()->month)
        ->sum('points');

    $recentRecords = DailyProgramAnswer::whereIn('student_id', $studentsIds)
        ->latest()
        ->take(5)
        ->get();

    $students = $teacher->students()
        ->with('user')
        ->withSum('prayerRecords as total_points', 'points')
        ->get();

    $topStudents = $teacher->students()
        ->with('user')
        ->withSum('prayerRecords as total_points', 'points')
        ->orderByDesc('total_points')
        ->take(3)
        ->get();

    return view('teacher.dashboard', [
        'studentsCount' => $students->count(),
        'todayPoints'   => $todayPoints,
        'weeklyPoints'  => $weeklyPoints,
        'monthlyPoints' => $monthlyPoints,
        'topStudents'   => $topStudents,
        'recentRecords' => $recentRecords,
    ]);
}



public function students()
{
    $teacher = Auth::user()->teacherProfile;

    if (!$teacher) {
        return redirect('/login');
    }

$students = $teacher->students()
    ->with('user')
    ->withSum('prayerRecords as total_points', 'points')
    ->orderByDesc('total_points')
    ->get();

    return view('teacher.students', compact('students'));
}
// public function topThree()
// {
//     $teacher = Auth::user()->teacherProfile;

//     $topThree = $teacher->students()
//         ->with('user')
//         ->withSum('prayerRecords as total_points', 'points')
//         ->orderByDesc('total_points')
//         ->take(3)
//         ->get();

//     return view('teacher.top-three', compact('topThree'));
// }

public function showStudent($id)
{
    $questionNames = [
    'm1' => 'صلاة الفجر',
    'm2' => 'صلاة الظهر',
    'm3' => 'صلاة العصر',
    'm4' => 'صلاة المغرب',
    'm5' => 'صلاة العشاء',
    'm6' => 'سنة الفجر',
    'm7' => 'سنة الظهر القبلية',
    'm8' => 'سنة الظهر البعدية',
    'm9' => 'سنة العصر',
    'm10' => 'سنة المغرب',
    'm11' => 'سنة العشاء',
    'm12' => 'الضحى',
    'm13' => 'الأوابين',
    'm14' => 'قيام الليل',
    'm15' => 'الوتر',
    'm16' => 'تلاوة القرآن الكريم',
    'm17' => 'حفظ القرآن الكريم',
    'm18' => 'بر الأم',
    'm19' => 'بر الأب',
    'm20' =>  'الورد الصباحي',
    'm21' => 'الورد المسائي',
    'm22' => 'ساعات الدراسة',
    'm23' => 'الوقت الضائع',
    'm24' => 'عمل خير',
    'm25' => 'أفراح قلب',
    'm26' => 'إحياء السنة الأسبوعية',

];

    $student = StudentProfile::with('user')->findOrFail($id);

    $daily = DailyProgramAnswer::where('student_id', $id)
        ->where('date', now()->toDateString())
        ->get();

    $weekly = DailyProgramAnswer::where('student_id', $id)
        ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
        ->get();

    $weeklySummary = $this->buildFullSummary($weekly);

     $weeklyTotals = [
    'total_records' => $weekly->count(),
    'total_points'  => $weekly->sum('points'),
];
    return view('teacher.students.show', compact(
        'student',
        'daily',
        'weekly',
        'weeklySummary',
        'weeklyTotals',
        'questionNames'
    ));
}


private function buildFullSummary($records)
{
    $summary = [];

    foreach ($records as $rec) {
        $qid = $rec->question_id;

        if (!isset($summary[$qid])) {
            $summary[$qid] = [
                'question_id' => $qid,
                'answer_text' => $rec->answer_text,
                'points'      => $rec->points,
                'count'       => 1,
            ];
        } else {
            $summary[$qid]['count']++;
            $summary[$qid]['points'] += $rec->points;
        }
    }

    return $summary;
}



}
