<?php

namespace App\Events;

use Carbon\Carbon;
use App\Models\Backup;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DatabaseBackUpNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $backup;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Backup $backup)
    {
        $this->backup = $backup;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['system'];
    }

    public function broadcastAs()
    {
        return 'DatabaseBackUpNotification';
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->backup->message,
            'status' => $this->backup->status,
            'created_at' => new Carbon($this->backup->created_at)
        ];
    }
}