<?php

namespace App\Http\Middleware;

use App\Models\UserExam;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StartExam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user_exam = UserExam::query()->where('user_id', auth()->user()->id)->where('exam_id', $request->route('exam')->id)->first();
        $request->session()->put('user_exam', $user_exam->id);
        return $next($request);
    }
}
