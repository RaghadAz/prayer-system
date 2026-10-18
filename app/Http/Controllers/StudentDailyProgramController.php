<?php

namespace App\Http\Controllers;

use App\Models\DailyProgramAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDailyProgramController extends Controller
{

    public function saveDailyProgram(Request $request)
    {


        $studentId = Auth::user()->studentProfile->id;
        $date = now()->toDateString();

        foreach ($request->answers as $questionId => $answerText) {

            DailyProgramAnswer::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'date' => $date,
                    'question_id' => $questionId,
                ],
                [
                    'answer_text' => $answerText,
                    'points' => $this->calculatePoints($questionId, $answerText),
                    'set_name' => $request->setName,
                ]
            );
        }


        return response()->json(['message' => 'تم حفظ الإجابات بنجاح']);
    }
    private function calculatePoints($questionId, $answerText)
    {
        $answerText = trim($answerText);
        if ($answerText === 'حاضر') return 3;
        if ($answerText === 'قضاء') return 1;
        if ($answerText === ' - ') return 0;

        if ($answerText === 'ركعتين') return 2;
        if ($answerText === ' - ') return 0;

        if ($answerText === 'نص صفحة') return 5;
        if ($answerText === '2 اية') return 3;
        if ($answerText === '1 اية') return 1;
        if ($answerText === '0') return 0;

        if ($answerText === 'جيد') return 5;
        if ($answerText === 'وسط') return 3;
        if ($answerText === 'ضفيف') return 0;


        if (is_numeric($answerText)) return intval($answerText);

        if ($answerText === 'تم') return 1;

        return 0;
    }
    public function getTodayAnswers()
    {
        $studentId = Auth::user()->studentProfile->id;
        $date = now()->toDateString();

        $answers = DailyProgramAnswer::where('student_id', $studentId)
            ->where('date', $date)
            ->pluck('answer_text', 'question_id');

        return response()->json($answers);
    }
}
