<?php
namespace App\Http\Controllers;

use App\Models\DailyProgramAnswer;
use App\Models\PrayerRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrayerRecordController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'student_id'  => 'required|exists:student_profiles,id',
            'teacher_id'  => 'required|exists:teacher_profiles,id',
            'date'        => 'required|date',
            'prayer_name' => 'required|string',
            'status'      => 'required|string',
        ]);

        $points = $this->calculatePoints($request->status);

        $record = PrayerRecord::where('student_id', $request->student_id)
            ->where('date', $request->date)
            ->where('prayer_name', $request->prayer_name)
            ->first();

        if ($record) {
            $record->update([
                'status' => $request->status,
                'points' => $points,
            ]);

            return response()->json([
                'message' => 'Prayer record updated successfully',
                'data' => $record
            ]);
        }

        $newRecord = PrayerRecord::create([
            'student_id'  => $request->student_id,
            'teacher_id'  => $request->teacher_id,
            'date'        => $request->date,
            'prayer_name' => $request->prayer_name,
            'status'      => $request->status,
            'points'      => $points,
        ]);

        return response()->json([
            'message' => 'Prayer record created successfully',
            'data' => $newRecord
        ]);
    }

    private function calculatePoints( $status)
    {
        return match ($status) {
            'first_time'  => 5,
            'middle_time' => 3,
            'last_time'   => 2,
            'qada'        => 0,
            default => 0,
        };
    }

    public function showForStudent( $student_id)
{
    $records = PrayerRecord::where('student_id', $student_id)
        ->orderBy('date', 'desc')
        ->get();

    return response()->json([
        'message' => 'Prayer records for student',
        'data' => $records
    ]);
}
public function weeklyForStudent( $student_id)
{
    $startDate = now()->subDays(6)->toDateString();
    $records = PrayerRecord::where('student_id', $student_id)
        ->where('date', '>=', $startDate)
        ->orderBy('date', 'desc')
        ->get();

    return response()->json([
        'message' => 'Weekly prayer records for student',
        'data' => $records
    ]);
}
public function weeklyPointsSummary(int $student_id)
{
    $startDate = now()->subDays(6)->toDateString();

    $records = PrayerRecord::where('student_id', $student_id)
        ->where('date', '>=', $startDate)
        ->get();

    $totalPoints = $records->sum('points');

    $totalPrayers = $records->count();


    return response()->json([
        'message' => 'Weekly points summary',
        'summary' => [
            'total_points' => $totalPoints,
            'total_prayers' => $totalPrayers,
        ]
    ]);
}

// public function dailyReportPage(Request $request)
// {
//     $date = $request->date ?? now()->toDateString();

//     $records = PrayerRecord::where('teacher_id', Auth::user()->teacherProfile->id)
//         ->where('date', $date)
//         ->get();


//     $summary = [
//         'total_records'   => $records->count(),
//         'first_time'      => $records->where('status', 'first_time')->count(),
//         'middle_time'     => $records->where('status', 'middle_time')->count(),
//         'last_time'       => $records->where('status', 'last_time')->count(),
//         'qada'            => $records->where('status', 'qada')->count(),
//         'total_points'    => $records->sum('points'),
//     ];

//     return view('teacher.reports.daily', compact('summary', 'date'));
// }

public function dailyReport($studentId)
{
    $records = DailyProgramAnswer::where('student_id', $studentId)
        ->where('date', now()->toDateString())
        ->get();

    return $records;
}


// public function weeklyReportPage()
// {
//     $teacherId = Auth::user()->teacherProfile->id;

//     $records = PrayerRecord::where('teacher_id', $teacherId)
//         ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
//         ->get();

//     $summary = [
//         'total_records'   => $records->count(),
//         'first_time'      => $records->where('status', 'first_time')->count(),
//         'middle_time'     => $records->where('status', 'middle_time')->count(),
//         'last_time'       => $records->where('status', 'last_time')->count(),
//         'qada'            => $records->where('status', 'qada')->count(),
//         'total_points'    => $records->sum('points'),
//     ];

//     return view('teacher.reports.weekly', compact('summary'));
// }
public function weeklyReport($studentId)
{
    $records = DailyProgramAnswer::where('student_id', $studentId)
        ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
        ->get();

    return $records;
}

public function weeklySummary($studentId)
{
    $records = DailyProgramAnswer::where('student_id', $studentId)
        ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
        ->get();

    return [
        'total_records' => $records->count(),
        'total_points'  => $records->sum('points'),
    ];
}




}



