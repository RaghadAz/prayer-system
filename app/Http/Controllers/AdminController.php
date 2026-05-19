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
    return view('admin.create-user', compact('teachers'));}

public function storeUser(Request $request)
{
    $request->validate([
        'name' => 'required',
        'username' => 'required|unique:users,username',
        'role' => 'required|in:teacher,student',
    ],[
        'name.required' => 'الاسم مطلوب.',
        'username.required' => 'اسم المستخدم مطلوب.',
        'username.unique' => 'اسم المستخدم مستخدم من قبل.',
        'password.required' => 'كلمة المرور مطلوبة.',
        'password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل.',
        'role.required' => 'يجب اختيار نوع الحساب.',
    ]);

    $password = Str::random(6);

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
    $students = StudentProfile::with('user')
        ->with('teacher.user')
        ->get();

    return view('admin.students', compact('students'));
}

public function showTeacher($id)
{
    $teacher = TeacherProfile::with('user')
        ->with('students.user')
        ->findOrFail($id);

    return view('admin.show-teacher', compact('teacher'));
}

public function showStudent($id)
{
    $student = StudentProfile::with('user', 'teacher.user')->findOrFail($id);

    $today = now()->toDateString();
    $weekStart = now()->subDays(6)->toDateString();
    $monthStart = now()->subDays(29)->toDateString();

    $todayPoints = PrayerRecord::where('student_id', $id)
        ->where('date', $today)
        ->sum('points');

    // نقاط الأسبوع
    $weeklyPoints = PrayerRecord::where('student_id', $id)
        ->whereBetween('date', [$weekStart, $today])
        ->sum('points');

    // نقاط الشهر
    $monthlyPoints = PrayerRecord::where('student_id', $id)
        ->whereBetween('date', [$monthStart, $today])
        ->sum('points');

    // كل الصلوات
    $records = PrayerRecord::where('student_id', $id)
        ->orderBy('date', 'desc')
        ->get();

    return view('admin.show-student', compact(
        'student',
        'todayPoints',
        'weeklyPoints',
        'monthlyPoints',
        'records'
    ));
}

}
