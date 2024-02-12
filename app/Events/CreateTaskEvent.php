<?php

namespace App\Events;

use App\Models\Task;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateTaskEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;

    /**
     * Create a new event instance.
     *
     * @param  Task  $task
     * @return void
     */
    public function __construct()
    {
    }
}