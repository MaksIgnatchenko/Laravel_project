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

    public function edit()
    {
        $tasks = Task::paginate(2);
        $path = $tasks->toArray()['path'];
        $actpage = $tasks->toArray()['current_page'];
        $totalPageCount = $tasks->toArray()['last_page'];
        return view('edit', compact('tasks','actpage', 'totalPageCount', 'path'));
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

    public function train($id)
    {

        $task = Task::findOrFail($id);

        return view('train', compact('task'));
    }

    public function test(Request $request, $id)
    {
        $post = $request->input('editor');
        if (isset($post)) {
            $test = Task::find($id)->check_code;
            $preCode = '';
            $preCode .= '<?php' . "\n";
            $preCode .= $post;
            $preCode .= $test;
            $hand = fopen("code.php", "w");
            fwrite($hand, $preCode);
            fclose($hand);
            $descriptorspec = array(
                0 => array("pipe", "r"),  // stdin - канал, из которого дочерний процесс будет читать
                1 => array("pipe", "w"),  // stdout - канал, в который дочерний процесс будет записывать
                2 => array("pipe", "w") // stderr - файл для записи
            );
            $process = proc_open("php", $descriptorspec, $pipes, null, null);
            if (is_resource($process)) {
                fwrite($pipes[0], $preCode);
                fclose($pipes[0]);
                $result = stream_get_contents($pipes[1]);
                fclose($pipes[1]);
            }

        }
        $task = Task::find($id);
        return view('train', compact("task", "result", "post"));
    }

    public function chek(Request $request)
    {
        if ($request->input('chek')) {
            $post = $request->input('params');
            $test = $request->input('check_code');

            $code = '';
            $code .= '<?php' . "\n";
            $code .= $post;
            $code .= $test;

            $hand = fopen("check.php", "w");
            fwrite($hand, $code);
            fclose($hand);
            $descriptorspec = array(
                0 => array("pipe", "r"),  // stdin - канал, из которого дочерний процесс будет читать
                1 => array("pipe", "w"),  // stdout - канал, в который дочерний процесс будет записывать
                2 => array("pipe", "w") // stderr - файл для записи
            );
            $process = proc_open("php", $descriptorspec, $pipes, null, null);
            if (is_resource($process)) {
                fwrite($pipes[0], $code);
                fclose($pipes[0]);
                $result = stream_get_contents($pipes[1]);
                fclose($pipes[1]);
            }
            $task = Task::find(1);
            return view('create_view', compact("task", "result", "code"));
        }
        else{
            $this->create();
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
       $task;
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
