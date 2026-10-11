<?php

namespace App\Http\Controllers;

use App\Models\StudentProfile;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    public function studentRanking($user_id)
    {
        $students = StudentProfile::where('user_id', $user_id)
            ->with('user')
            ->withSum('prayerRecords as total_score', 'points')
            ->first();

        $student->total_score = $student->total_score ?? 0;

        return response()->json($students);
    }
}
