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

        if ($answerText === '50') return 3;
        if ($answerText === '10') return 1;

        if ($answerText === 'ركعتين') return 2;
        if ($answerText === ' - ') return 0;

        if ($answerText === '2-5 أحاديث') return 3;
        if ($answerText === '1 حديث') return 1;

        if ($answerText === 'نص صفحة') return 4;
        if ($answerText === '2 اية') return 3;
        if ($answerText === '1 اية') return 1;
        if ($answerText === '0') return 0;


        if ($answerText === '3-5 ساعات') return 4;
        if ($answerText === 'ساعة-ساعتين') return 3;
        if ($answerText === 'أقل من ساعة') return 1;
        if ($answerText === '0') return 0;



        if ($answerText === 'جيد') return 3;
        if ($answerText === 'وسط') return 1;
        if ($answerText === 'ضفيف') return 0;

        if ($answerText === '9-10') return 1;
        if ($answerText === '11-12') return 0;


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

        // $today = DailyProgramAnswer::where(
        //     'student_id',
        //     $studentId
        // )->where(
        //     'date',
        //     now()->toDateString()
        // )->get();

        // return response()->json([
        //     'set_name' => $today->first()?->set_name,
        //     'answers' => $today->pluck('answer_text', 'question_id')
        // ]);
    }
}
