<?php

namespace App\Http\Controllers;

use App\Dto\PaginationDto;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter = null)
    {
        $tagslist = Task::select('theme')->distinct()->get();

        $dto = new PaginationDto();

        if($filter){
            $tasks = Task::where('theme', '=', $filter)->paginate(3);
        } else{
            $tasks = Task::paginate(3);
        }
        $dto->setTasks($tasks)
            ->setPath($tasks->toArray()['path'])
            ->setActpage($tasks->currentPage())
            ->setTotalPageCount($tasks->lastPage());

        return view('main', compact('dto', 'tagslist'));
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


    public function train( Request $request, Task $task)
    {
        $paginate = Task::paginate(1);
        if ($request->query()) {
            $task = Task::find($paginate->toArray()['data'][0]['id']);
        }
        $path = $paginate->toArray()['path'];
        $actpage = $paginate->currentPage();
        $totalPageCount = $paginate->lastPage();

        return view('train', compact('task', 'actpage', 'totalPageCount', 'path', 'paginate'));
    }

    public function test(Request $request, Task $task)
    {
        if (isset($request->test)) {
            $taskResult = $task->test($request->editor);
            if (($taskResult->isPassed) && (Auth::user())) {
                SolutionController::create($taskResult);
            }
        }
            $paginate = Task::paginate(1);
            $task = Task::find($paginate->toArray()['data'][0]['id']);
            $path = $paginate->toArray()['path'];
            $actpage = $paginate->currentPage();
            $totalPageCount = $paginate->lastPage();
        return view('train', compact('task', 'taskResult', 'actpage', 'totalPageCount', 'path', 'paginate'));
    }

    public function check(Request $request, Task $task)
    {
        if ($request->task_example)
        {
            $task = new Task();
            $task->id = 1;
            $task->task_desc = $request->task_example;
            $task->task_view = $request->task_view;
            $task->check_code = $request->check_code;
            $task->language = $request->language;
            $taskResult = $task->test($request->editor);
            $example = true;
            return view('create_view', compact('task', 'taskResult', 'example'));
        } else {
            $task->language = $request->language;
            $task->task_desc = $request->task_desc;
            $task->task_view = $request->task_view;
            $task->check_code = $request->check_code;
            $taskResult = $task->test($request->editor);
            $update = true;
            return view('create_view', compact('task', 'taskResult', 'update'));
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        $task = new Task;
        $task->user_id = Auth::user()->id;
        $task->language = $request->language;
        $task->task_desc = $request->task_example;
        $task->check_code = $request->check_code;
        $task->task_view = $request->task_view;
        $task->save();
        return redirect()->action('TaskController@showedit');
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
        $task->language = $request->language;
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
//        dd($request->request);
        if ($request->action === 'check') {
            return $this->check($request, $task);
        } elseif ($request->action === 'update') {
            return $this->update($request, $task);
        } else {
            return $this->create($request);
        }
    }

    public function showTask(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        return response()->json($task);
    }

    public function ajaxTest(Request $request)
    {
        $task = Task::find($request->task['id']);
        $taskResult = $task->test($request->editor);
        if ($taskResult->isPassed === true) {
            SolutionController::create($taskResult);
        }
        return response()->json($taskResult);
    }

    public function tasks()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

}
