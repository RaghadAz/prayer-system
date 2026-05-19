<?php

namespace App\Http\Controllers;

use App\Models\StudentProfile;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
public function studentRanking($user_id)
{
    $students = StudentProfile::where('user_id', $user_id)
        ->withSum('prayerRecords as total_score', 'points')
        ->orderByDesc('total_score')
        ->get();

    return response()->json($students);
}

}
