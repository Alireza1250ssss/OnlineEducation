<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Notifications\CourseAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CourseUserController extends Controller
{
    public function store(Request $request, Course $course)
    {
        if ($request->action == 'add') {
            $leftCapacity = $course->capacity - $course->users()->count();
            if (count($request->students) > $leftCapacity)
                return back()->with('status', 'More Than The Capacity !!');
        }

        $course->users()->toggle($request->students);

        $course->update([
            'filled' => count($course->users)
        ]);

        if ($request->action == 'add') {
            $students = User::query()->whereIn('id', $request->students)->get();
            Notification::send($students, new CourseAdded($course));
        }

        return redirect("manager/dashboard/course/$course->id");
    }
}
