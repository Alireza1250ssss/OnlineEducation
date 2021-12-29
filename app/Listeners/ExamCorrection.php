<?php

namespace App\Listeners;

use App\Events\ExamFinishedEvent;
use App\Models\Question;
use App\Models\UserExam;
use App\Models\UserResponse;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class ExamCorrection
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ExamFinishedEvent  $event
     * @return void
     */
    public function handle(ExamFinishedEvent $event)
    {
        $userAnswers = UserResponse::where('user_exam_id', $event->user_exam)->get();
        $totalScore = 0;
        foreach ($userAnswers as $userAnswer) {
            $realAnswer = Question::find($userAnswer->question_id);
            $specifiedScore = $realAnswer->exams()->where('exam_id', $event->exam_id)->first()->pivot->temp_score;
            if (isset($realAnswer->answer['key'])) {
                if ($realAnswer->answer['key'] == $userAnswer->answer)
                    $totalScore += $specifiedScore;
            }
        }
        UserExam::where('id', $event->user_exam)->update([
            'result' => $totalScore
        ]);
    }
}
