<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    protected $questionViews=[
        'descriptive'=> 'teacher.question.descriptive',
        'test' => 'teacher.question.test',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $exam = Exam::find($request->exam_id);
        $question = Question::create([
            'title'=>$request->title,
            'course_id'=> $request->course_id,
            'score'=> $request->score,
            'type'=>$request->type,
            'content'=> $request->content,
            'answer'=> $request->answer ?? null
        ]);
        $exam->questions()->attach($question,['temp_score'=>$question->score]);
        return back();
    }

    
    public function edit(Question $question)
    {
        return view($this->questionViews[$question->type],compact('question'));
    }

    
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return redirect()->route('teacher.course',[$question->course->id]);
    }

    
    public function destroy(Question $question)
    {
        $question->delete();
        return back();
    }
}
