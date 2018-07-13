<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function tasklists()
    {
        return $this->belongsToMany('App\Tasklist', 'tasklist_group');
    }
}
