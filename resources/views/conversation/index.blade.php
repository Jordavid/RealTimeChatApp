@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 ">
                <div class="panel">
                    <div class="panel-heading">List of Friends</div>
                    @forelse ($friends as $friend)
                        <a href="{{route('conversation.show', $friend->id)}}" class="panel-block" style="justify-content: space-between">
                            <div>{{$friend->name}}</div>
                            <online-user :friend="{{$friend}}" :onlineusers="onlineUsers"></online-user>
                        </a>
                    @empty
                        <div class="panel-block">
                            You don't have any friends for now!
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection