<?php

namespace App\Http\Middleware;

use App\Models\UserExam;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckTime
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
        $time = $request->route('exam')->duration;
        $start = UserExam::where('id', $request->session()->get('user_exam'))->first()->start_at;
        if (Carbon::now()->subMinute($time) > $start) {
            return redirect('student/time-ended');
        }

        return $next($request);
    }
}
