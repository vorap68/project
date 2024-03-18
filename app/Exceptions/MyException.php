<?php

namespace App\Exceptions;

use Exception;
use App\Models\Task;

class MyException extends Exception
{
    private $taskThis;
    public function __construct(Task $task)
    {
        $this->taskThis = $task;
    }
    public function context(){
        return ['data'=> 'task is  busy now'];
    }

    public function render(){
        $task = $this->taskThis;
        return view('task.busy',compact('task'));
    }
}
