<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        return view('main', compact('tasks'));
    }

    public function train($id)
    {
        $task = Task::find($id);

        return view('train', compact('task'));
    }

    public function test(Request $request, $id)
    {
        $post = $request->input('editor');
        /*$post = $_POST['editor'];*/
        if (isset($post)) {
            $test = Task::find($id)->check_code;
            $preCode = '';
            $preCode .= '<?php' . "\n";
            $preCode .= $_POST['editor'];
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
                echo $result;
                fclose($pipes[1]);
            }

        }
        $task = Task::find($id);
        return view('train', compact("task", "result", "post"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        $task->task_desc = $_POST['task_desc'];
        $task->check_code = $_POST['check_code'];
        $task->task_view = $_POST['task_view'];
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
