<?php

namespace App\Executors;


class TaskResult
{
    public $task_id;
    public $isPassed;
    public $fullCode;
    public $userCode;
    public $result;
    public $error;


    public function __construct(Executor $executor)
    {
        $this->task_id = $executor->task_id;
        $this->isPassed = $executor->isPassed;
        $this->fullCode = $executor->code;
        $this->userCode = $executor->editor;
        $this->result = $executor->result;
        $this->error = $executor->error;
        return $this;
    }


}
