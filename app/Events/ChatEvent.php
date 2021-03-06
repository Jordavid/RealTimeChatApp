<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;
use App\Conversation;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // public $user;
    // public $message;

    public $conversation;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    // public function __construct(User $user, $message)
    // {
    //     $this->user = $user;
    //     $this->message = $message;
    //     $this->dontBroadcastToCurrentUser();
        
    // }

    public function __construct(Conversation $conversation) {
        $this->conversation = $conversation;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    // public function broadcastOn()
    // {
    //     return new PrivateChannel('chat');
    // }

    public function broadcastOn()
    {
        return new PrivateChannel('Conversation.' . $this->conversation->user_id . '.' . $this->conversation->friend_id);
    }
}
