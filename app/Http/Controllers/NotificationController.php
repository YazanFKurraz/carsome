<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{


    public function notificationList(){

        $notifications = auth()->user()->notifications()->orderBy('created_at','desc')->get();

        return view('admin.notifications.index', compact('notifications'));
    }


//    public function MarkAsRead(Request $request){
//
//        $notification = auth()->user()->notifications()->find($request);
//        if($notification) {
//            $notification->markAsRead();
//        }
//    }

    public function markAsReadAll()
    {

        $userUnreadNotify = auth()->user()->unreadNotifications;

        if ($userUnreadNotify) {

            $userUnreadNotify->markAsRead();

            return back();
        }

    }

}
