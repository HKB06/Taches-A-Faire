<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskTable extends Component
{
    public function render()
    {
        return view('livewire.task-table', [
            'tasks' => Task::all()
        ]);
    }
}