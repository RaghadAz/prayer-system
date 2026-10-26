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
    private function calculatePoints($questionId, $answerText, $setName = 'default')
    {
        $answerText = trim($answerText);

        if (in_array($setName, ['teacher2', 'alternate2'])) {
            if ($answerText === 'اول الوقت') return 3;
            if ($answerText === 'نصف الوقت') return 1;
            if ($answerText === 'اخر الوقت') return 0;
            if ($answerText === '4 ركعات') return 3;
            if ($answerText === 'ركعتين') return 1;
            if ($answerText === ' - ') return 0;
            if ($answerText === '6 ركعات أو أكثر') return 5;
            if ($answerText === 'ركعة') return 1;
            if ($answerText === '3 ركعات') return 2;
            if ($answerText === 'أكثر من جزء') return 5;
            if ($answerText === '10-20 صفحة') return 3;
            if ($answerText === '1-10 صفحات') return 2;
            if ($answerText === '5-7 صفحة') return 5;
            if ($answerText === '2-4 صفحة') return 3;
            if ($answerText === 'صفحة') return 2;
            if ($answerText === 'نص صفحة') return 1;
            if ($answerText === 'جيد') return 3;
            if ($answerText === 'وسط') return 1;
            if ($answerText === 'ضعيف') return 0;
            if ($answerText === 'ساعة') return 3;
            if ($answerText === 'نصف ساعة') return 2;
            if ($answerText === 'ربع ساعة') return 1;
            if ($answerText === 'تم') return 1;
            if ($answerText === 'اكثر من 6') return 5;
            if ($answerText === '4-6 ساعات') return 3;
            if ($answerText === '2-3 ساعات') return 2;
            if ($answerText === 'أقل من ساعة') return 1;
            if ($answerText === 'اكثر من 2 ساعة') return 5;
            if ($answerText === 'ساعة 2') return 3;
            if ($answerText === 'ساعة') return 2;
            if ($answerText === 'نصف ساعة') return 1;


            if ($answerText === '200') return 3;
            if ($answerText === '100') return 1;
            if ($answerText === '250') return 5;
            if ($answerText === '150-200') return 3;
            if ($answerText === '100-150') return 2;
            if ($answerText === '1-100') return 1;
            if ($answerText === '8-10 أحاديث') return 5;
            if ($answerText === '5-7 أحاديث') return 3;
            if ($answerText === '2-4 أحاديث') return 2;
            if ($answerText === '1 حديث') return 1;

            if ($answerText === '0') return 0;


        }

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
