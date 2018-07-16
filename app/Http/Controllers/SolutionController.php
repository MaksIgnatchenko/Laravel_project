<?php

namespace App\Http\Controllers;

use App\Executors\TaskResult;
use App\Solution;
use Illuminate\Support\Facades\Auth;


class SolutionController extends Controller
{
    public static function create(TaskResult $taskResult)
    {

        $solution = Solution::where('task_id', $taskResult->task_id)
            ->where('user_id', Auth::id())
            ->first();
        if (!$solution) {
        $solution = new Solution();
            $solution->user_id = Auth::id();
            $solution->task_id = $taskResult->task_id;
            }
        $solution->solutionCode = $taskResult->userCode;
        $solution->save();
        return true;
    }
}
