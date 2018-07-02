<?php

namespace App\Http\Controllers;

use App\Executors\TaskResult;
use App\Solution;
use Illuminate\Support\Facades\Auth;


class SolutionController extends Controller
{
    public static function create(TaskResult $taskResult)
    {
        $user_id = Auth::user()->id;

        if (!Solution::where('task_id', $taskResult->task_id)
                       ->where('user_id', $user_id)->first()) {
            $solution = new Solution();
            $solution->user_id = $user_id;
            $solution->task_id = $taskResult->task_id;
            $solution->solutionCode = $taskResult->userCode;
            $solution->save();
        }
    }
}
