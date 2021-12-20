<?php

namespace App\Http\Controllers;

use App\Events\QuestionAdded;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,Exam $exam)
    {
        if($request->action == 'attach')
            foreach($request->question_id as $question){
                $question= Question::find($question);
                $exam->questions()->attach($question,['temp_score'=>$question->score]);
            }
        else
            $exam->questions()->detach($request->question_id);
        return back();
    }

    public function updateScore(Request $request,Exam $exam){
        $exam->questions()->updateExistingPivot($request->question_id,['temp_score'=>$request->score]);
        return back();
    }
}
