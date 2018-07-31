<?php
namespace App\Http\Controllers;
use App\Group;
use App\Solution;
use App\TasklistTask;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Tasklist;
use App\Task;
use Illuminate\Support\Facades\Auth;
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
        $task = Task::where('short_desc', $request->short_desc)->first();
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
        $solutions = [];
        foreach ($tasklist as $key => $task) {
            $solution = Solution::where('task_id', $task->id)
                                    ->where('user_id', Auth::id())
                                    ->first();
            if ($solution) {
                $solutions[$key] = true;
            } else {
                $solutions[$key] = false;
            }
        }
        foreach ($tasklist as $task){
            $tasks[] = $task->id;
        }
        return view('user_module', compact('tasklist', 'solutions', 'tasks'));
    }

    public function deleteTasklist(Tasklist $tasklist)
    {
        $tasklist->delete();
        $tasklist->tasks()->detach();
        return redirect()->route('tasklists');
    }
}