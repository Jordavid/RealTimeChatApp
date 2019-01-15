@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-4 col-4 offset-sm-3 col-sm-6">
                <li class="list-group-item active">Chat Room <span class="badge badge-pill badge-danger">@{{numberOfUsers}}</span></li>
                <ul class="list-group" v-chat-scroll>
                    <message v-for="message,index in chat.newMessage" :key="message.index" :color="chat.color[index]" 
                    :user=chat.user[index] :time="chat.time[index]">
                            @{{message}}
                    </message>
                </ul>
                <small class="badge badge-pill badge-dark">@{{typing}}</small>
                <input type="text" name="message" placeholder="Type Your msg here..." class="form-control" v-model="message" @keyup.enter="sendMessage">
                <button class="btn btn-primary form-control" @click="sendMessage">Send message</button>
            </div>
           
        </div>
    </div>

@endsection
<script src="{{asset('js/app.js')}}"></script>