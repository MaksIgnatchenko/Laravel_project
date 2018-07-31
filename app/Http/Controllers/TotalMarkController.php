<?php

namespace App\Http\Controllers;

use App\Group;
use App\Solution;
use App\Task;
use App\Tasklist;
use App\TasklistTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotalMarkController extends Controller
{
    public function index(Group $group)
    {
        $tasklists = $group->tasklists;
        $users = $group->users;
            foreach ($users as $user) {
                foreach ($tasklists as $tasklist) {
                $array[$user->name][$tasklist->name] = $group->rate($user, $tasklist);

            }
        }

        $rate = $group->rate($user, $tasklist);

        return view('total_marks', compact('group', 'array', 'tasklists'));
    }
    public function marks(Request $request)
    {
        $tasklist = Tasklist::where('name', $request->tasklist_name)->get();
        $tasklist_id = json_decode($tasklist)[0]->id;
        $tasks = TasklistTask::where('tasklist_id', $tasklist_id)->get();
        $tasks = json_decode($tasks);
        foreach ($tasks as $task){
            $task_id = json_decode($task->task_id);
            $arrayOfTasks[] = Task::where('id', $task_id)->get();
        }
        foreach ($arrayOfTasks as $task){
            $temp = Solution::where('user_id', $request->user_id)->where('task_id' , $task[0]->id)->get();
            if(count($temp) != 0){
                $arrayOfSolutions[] = $temp;
            }
        }
        return response()->json([
                'tasks' => $arrayOfTasks,
                'solution' => $arrayOfSolutions
        ]);
    }
}
