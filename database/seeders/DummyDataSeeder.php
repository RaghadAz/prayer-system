<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run()
{
    // إنشاء أنسة واحدة
    if (!\App\Models\User::where('username', 'mariam')->exists()) {

    $teacherUser = \App\Models\User::create([
        'name' => 'الأنسة مريم',
        'username' => 'mariam',
        'password' => bcrypt('123456'),
        'role' => 'teacher',
    ]);

    $teacher = \App\Models\TeacherProfile::create([
        'user_id' => $teacherUser->id,
    ]);

} else {

    $teacherUser = \App\Models\User::where('username', 'mariam')->first();
    $teacher = \App\Models\TeacherProfile::where('user_id', $teacherUser->id)->first();
}


    // أسماء الصلوات
    $prayers = ['fajr', 'duhr', 'asr', 'maghrib', 'isha'];

    // إنشاء 20 طالبة
    for ($i = 1; $i <= 20; $i++) {

        $user = \App\Models\User::create([
            'name' => "طالبة رقم $i",
            'username' => "student$i",
            'password' => bcrypt('123456'),
            'role' => 'student',
        ]);

        $student = \App\Models\StudentProfile::create([
            'user_id' => $user->id,
            'teacher_id' => $teacher->id,
        ]);

        // إنشاء سجلات صلاة لـ 20 يوم × 5 صلوات
        for ($d = 0; $d < 20; $d++) {

            foreach ($prayers as $prayer) {
                \App\Models\PrayerRecord::create([
                    'student_id' => $student->id,
                    'teacher_id' => $teacher->id,
                    'date' => now()->subDays($d)->format('Y-m-d'),
                    'prayer_name' => $prayer,
                    'status' => rand(0, 1),
                    'points' => rand(5, 15),
                ]);
            }
        }
    }
}


}
