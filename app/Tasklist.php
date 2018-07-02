<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
    public function tasks()
    {
        return $this->belongsToMany('App\Task', 'tasklist_task');
    }
}
