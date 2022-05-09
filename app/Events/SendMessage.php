<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $name;
    public string $message;
    public string $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $name, string $message, string $time)
    {
        $this->name = $name;
        $this->message = $message;
        $this->time = $time;
    }

    public function broadcastWith() {
        return [
            "name" => $this->name,
            "message" => $this->message,
            "time" => $this->time
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel("SendMessageEvent");
    }
}
