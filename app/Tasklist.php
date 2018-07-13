<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
    public function tasks()
    {
        return $this->belongsToMany('App\Task', 'tasklist_task');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'tasklist_group');
    }
}
