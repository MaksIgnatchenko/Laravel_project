<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function tasklists()
    {
        return $this->belongsToMany('App\Tasklist', 'tasklist_group');
    }

    public function tasklist($id)
    {
        $tasklist = $this->tasklists;
        $tasklist = $tasklist->where('id', $id)->first();
        return $tasklist;
    }

//    public function tasklist($id)
//    {
//        return $this->belongsToMany('App\Tasklist', 'tasklist_group');
//    }

    public function rate(User $user, Tasklist $tasklist)
    {
        $tasks = $tasklist->tasks->all();

        $tasks_id = [];
        foreach ($tasks as $task) {
            $tasks_id[] = $task->id;
        }

        return Solution::where('user_id', $user->id)->whereIn('task_id', $tasks_id)->get();

    }


}
