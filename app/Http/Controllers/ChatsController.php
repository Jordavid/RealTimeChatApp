<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatEvent;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function __construct() {
       $this->middleware('auth');
    }

    public function chat()
    {
        return view('chat');
    }

    public function send(Request $request)
    {
        //return $request->all();
        $user = Auth::user();

        $this->saveToSession($request);
        event(new ChatEvent($user, $request->message));
    }
    
    protected function saveToSession($request){
        session()->put('chats', $request->message);
        session()->put('chats', $request->message);
    }

    // public function send(Request $request)
    // {
    //     $user = Auth::user();
    //     $message = "Pusher is someting";
    //     event(new ChatEvent($user, $message));
        
    //     //return view('chat');
    // }
}
