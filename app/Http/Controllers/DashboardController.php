<?php

namespace App\Http\Controllers;

use App\Models\Course;
use app\models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard(){
        $role=auth()->user()->role;
        if($role=='manager')
            return $this->managerDashboard();
        else if($role=='teacher')
            return $this->teacherDashboard(auth()->user());
        else if($role == 'student')
            return $this->studentDashboard(auth()->user());
    }

    private function teacherDashboard(User $user){
        $courses = Course::where('teacher_id',$user->id)->get();
        return view('teacher.dashboard',compact('courses'));
    }

    private function managerDashboard(){
       $waitingList = User::waiting()->get();
       $teachers = User::query()->where('role','teacher')->get();
       $courses= Course::with('teacher')->get();
       $all =User::paginate(6);
       return view('dashboard',[
           'waitingList'=>$waitingList,
           'all'=>$all,
           'teachers'=>$teachers,
           'courses'=>$courses,
       ]);
    }

    public function courseDashboard(Course $course){
        $courseUsers=$course->users()->paginate(12);
        $students = User::query()->where('role','student')->paginate(12);
        return view('course',compact('students','course','courseUsers'));
    }

    public function teacherCourse(Course $course){
        $exams = $course->exams()->get();
        return view('teacher.course',compact('exams','course'));
    }

    private function studentDashboard(User $user)
    {
        $courses = $user->courses;
        return view('student.dashboard',compact('courses'));
    }
}
