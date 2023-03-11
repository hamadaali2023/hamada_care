<?php

namespace App\Events;

// use Illuminate\Broadcasting\Channel;
// use Illuminate\Broadcasting\InteractsWithSockets;
// use Illuminate\Broadcasting\PresenceChannel;
// use Illuminate\Broadcasting\PrivateChannel;
// use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
// use Illuminate\Foundation\Events\Dispatchable;
// use Illuminate\Queue\SerializesModels;

// class MessageSent
// {
//     use Dispatchable, InteractsWithSockets, SerializesModels;

//     /**
//      * Create a new event instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * Get the channels the event should broadcast on.
//      *
//      * @return \Illuminate\Broadcasting\Channel|array
//      */
//     public function broadcastOn()
//     {
//         return new PrivateChannel('channel-name');
//     }
// }


use App\User;
use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $message;
    public $chatId;
    public function __construct($user, Message $message,$chatId)
    {
        $this->user = $user;
        $this->message = $message;
        $this->chatId = $chatId;
       // dd($this->chatId);
    }

    public function broadcastOn()
    {
        return new Channel('chat.').$this->chatId;
    }


    // public $message;
    // public $chat_id;
    
    // public function __construct($message , $chat_id)
    // {
    //     $this->message= $message;
    //     $this->chat_id= $chat_id;
    // }

    // public function broadcastOn()
    // {
    //     return new Channel('chat.'.$this->chat_id);

    // }



    
}