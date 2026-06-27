<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PrayerRecordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDailyProgramController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');



Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/create-user', [AdminController::class, 'createUserForm'])
        ->name('admin.createUser');

    Route::post('/admin/create-user', [AdminController::class, 'storeUser'])
        ->name('admin.storeUser');

    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])
        ->name('admin.deleteUser');

    Route::get('/admin/students', [AdminController::class, 'listStudents'])
        ->name('admin.listStudents');

    Route::get('/admin/teachers', [AdminController::class, 'listTeachers'])
        ->name('admin.listTeachers');

    Route::get('/admin/students/{id}', [AdminController::class, 'showStudent'])
        ->name('admin.showStudent');

    Route::get('/admin/teachers/{id}', [AdminController::class, 'showTeacher'])
        ->name('admin.showTeacher');


    Route::post('/prayer-records', [PrayerRecordController::class,'store']);

    Route::post('/teachers', [TeacherController::class, 'store']);
    Route::post('/students', [StudentController::class, 'store']);


    Route::get('/admin/user-created/{id}', [AdminController::class, 'userCreated'])
        ->name('admin.userCreated');
    });


Route::middleware(['auth', 'teacher'])->group(function () {

    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])
        ->name('teacher.dashboard');


      //  Route::post('/student/daily-program/save', [StudentDailyProgramController::class, 'saveDailyProgram']);



    Route::get('/teacher/students', [TeacherController::class, 'students'])
        ->name('teacher.students');

    // Route::get('/teacher/{teacher_id}/students/results', [TeacherController::class, 'teacherStudentsResults']);

    // Route::get('/teacher/{teacher_id}/students/weekly-performance', [TeacherController::class, 'teacherWeeklyPerformance']);

    // Route::get('/teachers/{id}/students/ranking', [RankingController::class, 'studentRanking']);


    Route::get('/teacher/top-three', [TeacherController::class, 'topThree'])
        ->name('teacher.topThree');

Route::get('/teacher/students/{id}', [TeacherController::class, 'showStudent'])
    ->name('teacher.students.show');



        });



Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/student/home', function () {
    return view('student.home');
    })->name('student.home');


    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])
        ->name('student.dashboard');

    //Route::get('/students/{id}/prayer-records', [PrayerRecordController::class, 'showForStudent']);

    //Route::get('/students/{id}/prayer-records/weekly', [PrayerRecordController::class, 'weeklyForStudent']);

    //Route::get('/students/{id}/weekly-summary', [PrayerRecordController::class, 'weeklyPointsSummary']);




Route::get('/student/daily-program', [StudentController::class, 'dailyProgram'])
    ->name('student.daily.program');

Route::get('/student/weekly-sunnah', function () {
    return view('student.weekly-sunnah');
})->name('student.weekly.sunnah');


Route::post('/student/daily-program/save', [StudentDailyProgramController::class, 'saveDailyProgram'])
    ->name('student.daily.save');

Route::get('/student/daily-program/today', [StudentDailyProgramController::class, 'getTodayAnswers'])
    ->name('student.daily.today');

});
