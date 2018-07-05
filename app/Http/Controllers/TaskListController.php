<?php

namespace App\Http\Controllers;

use App\TasklistTask;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Tasklist;
use App\Task;
use Illuminate\Support\Facades\DB;

class TasklistController extends Controller
{
    public function index()
    {
        $tasklists = DB::table('tasklists')
            ->join('tasklist_task', 'tasklists.id', '=', 'tasklist_task.tasklist_id')
            ->join('tasks', 'tasks.id', '=', 'tasklist_task.task_id')
            ->orderBy('order_id')
            ->get();

        dd($tasklists);
        return view('adminTasklist', compact('tasklists'));
    }

    public function create(Request $request)
    {
        $tasklist = new Tasklist();
        $tasklist->name = $request->tasklistName;
        $tasklist->save();
        return redirect()->route('tasklists');
    }

    public function addTask(Request $request)
    {


        $tasklist = TaskList::find($request->tasklist_id);
        $task = Task::where('id', $request->task_id)->first();
        $tasklist->tasks()->attach($task->id);
        return redirect()->route('tasklists');
    }

    public function menuStore(Request $request)
    {
        $tasks = explode(',', $_POST['order']);

        foreach($tasks as $key => $value){
            TasklistTask::where(['task_id' => $value, 'tasklist_id' => $_POST['id']])->update(['order_id' => $key+1]);
        }
    }
}
