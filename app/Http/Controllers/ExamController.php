<?php

namespace App\Http\Controllers;

use App\Events\ExamFinishedEvent;
use App\Http\Requests\ExamRequest;
use App\Http\Requests\SetScoreRequest;
use App\Models\Exam;
use App\Models\Question;
use App\Models\UserExam;
use App\Models\UserResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{

    public function manageScores(Request $request, Exam $exam)
    {
        $usersTaken = UserExam::where('exam_id', $exam->id)->where('taken', 1)->get();
        return view('teacher.manage-scores', compact('usersTaken'));
    }

    public function getStudentAnswers(UserExam $userExam)
    {
        if (!session('pre_url'))
            Session::put('pre_url', url()->previous());
        $responses = $userExam->responses;
        $questions = Question::whereIn('id', $responses->pluck('question_id')->toArray())->get();
        $responses = $responses->keyBy(function ($item) {
            return $item['question_id'];
        });
        foreach ($questions as &$question) {
            $score = $question->exams()->where('exam_id', $userExam->exam_id)->first()->pivot->temp_score;
            $question['temp_score'] = $score;
        }
        return view('teacher.correct-exam', compact('responses', 'questions'));
    }

    public function setScore(SetScoreRequest $request, UserExam $userExam)
    {
        $preScore = $userExam->result;
        $totalScore = array_sum($request->score) + $preScore;
        $userExam->update([
            'result' => $totalScore
        ]);
        return redirect($request->session()->get('pre_url'));
    }


    public function store(ExamRequest $request)
    {
        $exam = Exam::create($request->all());
        $users = $exam->course->users;
        foreach ($users as $user)
            UserExam::create([
                'user_id' => $user->id,
                'exam_id' => $exam->id,
                'taken' => 0
            ]);
        return back();
    }


    public function show(Exam $exam)
    {
        $exam = Exam::with(['questions', 'course.questions'])->find($exam->id);
        return view('teacher.exam', [
            'exam' => $exam
        ]);
    }


    public function destroy(Exam $exam)
    {
        $exam->delete();
        return back();
    }
}
