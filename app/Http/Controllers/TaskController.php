<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(3);
        $path = $tasks->toArray()['path'];
        $actpage = $tasks->toArray()['current_page'];
        $totalPageCount = $tasks->toArray()['last_page'];

        return view('main', compact('tasks', 'actpage', 'totalPageCount', 'path'));
    }

    public function showedit()
    {
        $tasks = Task::paginate(2);
        $path = $tasks->toArray()['path'];
        $actpage = $tasks->toArray()['current_page'];
        $totalPageCount = $tasks->toArray()['last_page'];
        return view('edit', compact('tasks', 'actpage', 'totalPageCount', 'path'));
    }

    public function next($id)
    {

        $task = Task::next($id);

        return view('train', compact('task'));
    }

    public function prew($id)
    {
        $task = Task::prew($id);

        return view('train', compact('task'));
    }

    public function train(Task $task)
    {

        $paginate = Task::paginate(1);
        $task = Task::find($paginate->toArray()['data'][0]['id']);
        $path = $paginate->toArray()['path'];
        $actpage = $paginate->toArray()['current_page'];
        $totalPageCount = $paginate->toArray()['last_page'];

        return view('train', compact('task', 'actpage', 'totalPageCount', 'path', 'paginate'));
    }

    public function test(Request $request, Task $task)
    {
        echo "azqwe";
        echo "fghfgh";
        echo "fghfgh";
        echo "tyutyut";


        $paginate = Task::paginate(1);
        dd($paginate);
        $task = Task::find($paginate->toArray()['data'][0]['id']);
        $path = $paginate->toArray()['path'];
        $actpage = $paginate->toArray()['current_page'];
        $totalPageCount = $paginate->toArray()['last_page'];

    if(isset($request->test)) {
            $userCode = $request->editor;
            $exam = exam($task, $request->editor);
}
        return view('train', compact('task', 'userCode', 'exam', 'actpage', 'totalPageCount', 'path', 'paginate'));
    }

    public function check(Request $request, $task = NULL)
    {
        $action = 'update';
        if(!$task) {
            $task = new Task();
            $action = 'save';
        }
        $task->task_desc = $request->task_desc;
        $task->task_view = $request->task_view;
        $task->check_code = $request->check_code;
        $exam = exam($task, $request->editor);
        $usercode= $request->editor;
        if ($action === 'save') {
            return view('create_view', compact("task", "exam"));
        } else {
            return view('create_view', compact("task", "exam",'usercode'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $task = new Task;
        $task->user_id = Auth::user()->id;
        $task->task_desc = $request->task_desc;
        $task->check_code = $request->check_code;
        $task->task_view = $request->task_view;
        $task->save();
        return redirect()->action('TaskController@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->task_desc = $request->task_desc;
        $task->check_code = $request->check_code;
        $task->task_view = $request->task_view;
        $task->save();
        return redirect()->action('TaskController@showedit');
    }

    public function edit(Request $request, Task $task)
    {
        $update = true;
        return view('create_view', compact("task", "exam", "update"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {

    }

    public function distribute(Request $request, Task $task)
    {

        if ($request->action === 'check') {
            return $this->check($request, $task);
        } elseif ($request->action === 'update') {
            return $this->update($request, $task);
        } else {
            return $this->create($request);
        }
    }

}
