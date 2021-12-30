<?php

namespace App\Http\Controllers;

use App\Events\ExamFinishedEvent;
use App\Models\Exam;
use App\Models\UserExam;
use App\Models\UserResponse;
use Illuminate\Http\Request;

class TakeExamController extends Controller
{
    public function startExam(Request $request, Exam $exam)
    {
        UserExam::where('id', $request->session()->get('user_exam'))->update([
            'taken' => 1,
            'start_at' => now()
        ]);

        return view('student.exam.exam-start', compact('exam'));
    }

    public function takeExam(Request $request, Exam $exam)
    {

        $this->updateAnswer($request);

        $question = $exam->questions()->paginate(1);
        UserResponse::updateOrCreate(
            [
                'user_exam_id' => $request->session()->get('user_exam'),
                'question_id' => $question[0]->id
            ],
            [
                'answer' => ''
            ]
        );
        return view('student.exam.exam', compact('question', 'exam'));
    }

    private function updateAnswer($request)
    {
        if ($request->has('answer') && $request->filled('answer')) {
            UserResponse::where('user_exam_id', $request->session()->get('user_exam'))
                ->where('question_id', $request->question_id)->update([
                    'answer' => $request->answer
                ]);
        }
    }

    public function finishExam(Request $request, Exam $exam)
    {

        $this->updateAnswer($request);
        ExamFinishedEvent::dispatch($request->session()->get('user_exam'),$exam->id);
        $request->session()->pull('user_exam');
        return view('student.exam.examEnded');
    }
}
