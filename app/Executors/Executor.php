<?php

namespace App\Executors;

use App\Task;

Abstract class Executor
{
    const DESCRIPTORSPEC = [
        0 => ["pipe", "r"],
        1 => ["pipe", "w"],
        2 => ["pipe", "w"]
    ];
    public $check_code;
    public $editor;
    public $isPassed;
    public $code;
    public $result;
    public $error;
    private $pipes;

    public function __construct(Task $task, string $editor=null)
    {
        $this->check_code = $task->check_code;
        $this->editor = $editor;
    }

    public static function execute(Task $task, string $editor = null)
    {
        $executor = new static($task, $editor);
        return $executor->getTaskResult();

    }

    private function getTaskResult()
    {
        $process = proc_open(static::LANGUAGE, self::DESCRIPTORSPEC, $this->pipes, null, null);
        $this->code = static::INTERPRETER . $this->editor . $this->check_code;
        if (is_resource($process)) {
            fwrite($this->pipes[0], $this->code);
            fclose($this->pipes[0]);
            $this->result = stream_get_contents($this->pipes[1]);
            fclose($this->pipes[1]);
            $this->error = stream_get_contents($this->pipes[2]);
            fclose($this->pipes[2]);
            proc_close($process);
        }
        if (is_numeric($this->result)) {
            $this->isPassed = !preg_match('/0+/', $this->result);
        } else {
            $this->isPassed = null;
        }
        return new TaskResult($this);
    }
}