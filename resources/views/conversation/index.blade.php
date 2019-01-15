@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 ">
                <div class="panel">
                    <div class="panel-heading">List of Friends</div>
                    @forelse ($friends as $friend)
                        <a href="{{route('conversation.show', $friend->id)}}" class="panel-block">
                            {{$friend->name}}
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