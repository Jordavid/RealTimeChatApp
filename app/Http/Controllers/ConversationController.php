<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ConversationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Auth::user()->friends();
       
        return view('conversation.index')->withFriends($friends);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show($friend_id)
    {
        $friend = User::findOrFail($friend_id);
        return view('conversation.show')->withFriend($friend);
    }

    public function getConversation($friend_id)
    {
        $conversatons = Conversation::where(function($query) use ($friend_id){
            $query->where('user_id', '=', Auth::user()->id)->where('friend_id', '=', $friend_id);
        })->orWhere(function($query) use ($friend_id){
            $query->where('user_id', '=', $friend_id)->where('friend_id', '=', Auth::user()->id);
        })->get();

        return $conversatons;
    }

    public function sendConversation(Request $request)
    {
        Conversation::create([
            'user_id' => $request->user_id,
            'friend_id' => $request->friend_id,
            'conversation' => $request->conversation
        ]);

        return [];

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        //
    }
}
