<?php

namespace App\Executors;


use App\Task;
use App\Executors;
abstract class ExecutorFactory
{
    static public function getTaskResult(Task $task, string $editor) :TaskResult
    {
        $className = __NAMESPACE__ . '\\' .ucfirst($task->language) . 'Executor';
        return $className::execute($task, $editor);
    }
}