<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markRead(Request $request)
    {
        auth()->user()->notifications->whereIn('id', json_decode($request->notifs))->markAsRead();
    }

    public function delete(Request $request)
    {
        $items =  auth()->user()->notifications()->whereIn('id', json_decode($request->notifs))->get();
        foreach ($items as $item)
            $item->delete();
    }
}
