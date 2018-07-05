<?php

namespace App\Http\Controllers;

use App\TasklistTask;
use Illuminate\Http\Request;
use App\Tasklist;
use App\Task;

class TasklistController extends Controller
{
    public function index()
    {
        $tasklists = Tasklist::all();
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

        if($request->query) {
            dd($request->all());
            $id_ary = explode(",",$request->row_order);
            for($i=0;$i<count($id_ary);$i++) {
                TasklistTask::where(['task_id' => $id_ary[$i], 'tasklist_id' => $request->tasklist_id])->update(['order_id' => $i]);
            }
        }

          return redirect()->route('tasklists');


    }

    public function menuStore(Request $request)
    {

        if($request->query) {
            dd($request->all());
            $id_ary = explode(",",$request->row_order);
            for($i=0;$i<count($id_ary);$i++) {
                TasklistTask::where(['task_id' => $id_ary[$i], 'tasklist_id' => $request->tasklist_id])->update(['order_id' => $i]);
            }
        }

          return redirect()->route('tasklists');


    }
}
