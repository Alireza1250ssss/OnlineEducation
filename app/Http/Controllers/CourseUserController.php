<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseUserController extends Controller
{
    public function store(Request $request,Course $course){
        $course->users()->toggle($request->students);

        $course->update([
            'filled'=> count($course->users)
        ]);

        return redirect("/dashboard/course/$course->id");

    }


}
