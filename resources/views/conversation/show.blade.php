@extends('layouts.app')

@section('content')
    
    <meta name="friend_id" content="{{$friend->id}}">

    <div class="container">
        <div class="col-sm-12 offset-0">
            <div class="panel">
                <div class="panel-heading">
                    {{$friend->name}}
                    <div class="contain is-pulled-right">
                        <a href="{{url('conversation')}}" class="is-link">Back</a>
                    </div>
                </div>
                <div class="list-group" v-chat-scroll>
                    <conversation :conversations="conversations" :user_id={{Auth::user()->id}}
                        :friend_id="{{$friend->id}}" 
                        >
                        <span id="time" :time=time>@{{time}}</span>
                    </conversation>
                </div>
                
            </div>
        </div>
    </div>

@endsection