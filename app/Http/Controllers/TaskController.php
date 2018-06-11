<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
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

        return view('main', compact('tasks','actpage', 'totalPageCount', 'path'));
    }

    public function next($id)
    {

        $task =  Task::next($id);

        return view('train', compact('task'));
    }
    public function prew($id)
    {
        $task =  Task::prew($id);

        return view('train', compact('task'));
    }

    public function train(Task $task)
    {
        return view('train', compact('task'));
    }

    public function test(Request $request, Task $task)
    {
        $userCode = $request->editor;
        $interpreter = 'php -r ';
        $checkCode = $task->check_code;
        $cmd = $interpreter . '\'' . $userCode . $checkCode . '\'';
        $cmd = str_replace(["\r","\n", "\r\n"],"",$cmd);
        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin - канал, из которого дочерний процесс будет читать
            1 => array("pipe", "w"),  // stdout - канал, в который дочерний процесс будет записывать
            2 => array("pipe", "w") // stderr - файл для записи
        );
        $process = proc_open($cmd, $descriptorspec, $pipes, null, null);
        if (is_resource($process)) {
            $result = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            echo stream_get_contents($pipes[2]);
            fclose($pipes[2]);
            proc_close($process);
        }
        return view('train', compact('task', 'userCode', 'result'));
    }

    public function check(Request $request)
    {
        $task = Task::find(1);
        $userCode = $request->editor;
        $interpreter = 'php -r ';
        $checkCode = $task->check_code;
        $cmd = $interpreter . '\'' . $userCode . $checkCode . '\'';
        $cmd = str_replace(["\r","\n", "\r\n"],"",$cmd);
        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin - канал, из которого дочерний процесс будет читать
            1 => array("pipe", "w"),  // stdout - канал, в который дочерний процесс будет записывать
            2 => array("pipe", "w") // stderr - файл для записи
        );
        $process = proc_open($cmd, $descriptorspec, $pipes, null, null);
        if (is_resource($process)) {
            $result = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            echo stream_get_contents($pipes[2]);
            fclose($pipes[2]);
            proc_close($process);
        }
            return view('create_view', compact("task", "result", "checkCode"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $task = new Task;
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
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
        //
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

}
