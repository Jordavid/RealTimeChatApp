<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat Application</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>
        .list-group{
            overflow-y: scroll;
            height: 300px;
        }
    </style>
</head>
<body>
    <div id="app">
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
        </div>            
    </div>
    
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>