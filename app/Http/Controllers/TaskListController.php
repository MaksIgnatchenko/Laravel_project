<?php
namespace App\Http\Controllers;
use App\Group;
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
        $tasks = explode(',', $_POST['order']);
        foreach($tasks as $key => $value){
            TasklistTask::where(['task_id' => $value, 'tasklist_id' => $_POST['id']])->update(['order_id' => $key+1]);
        }
    }

    public function moduleTrain(Tasklist $tasklist)
    {
        $tasklist = $tasklist->tasks;
        return view('user_module', compact('tasklist'));
    }

    public function deleteTasklist(Tasklist $tasklist)
    {
        $tasklist->delete();
        return redirect()->route('tasklists');
    }
}