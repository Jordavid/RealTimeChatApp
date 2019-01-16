<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getNotification()
    {
        $notifications = Auth::user()->unreadNotifications;
        return $notifications;
    }

    public function maskAsRead(Request $request)
    {   
        Auth::user()->unreadNotifications()->find($request->id)->markAsRead();

        return "Message Read!";
    }
}
