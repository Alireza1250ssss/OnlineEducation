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
}
