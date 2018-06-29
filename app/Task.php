<?php

namespace App;

use App\Executors\ExecutorFactory;
use App\Executors\TaskResult;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function scopeNext($query,$id)
    {

        return $query->where('id', '>', $id)->first();
    }
    public function scopePrew($query,$id)
    {

        return $query->where('id', '<', $id)->get()->last();
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function test(string $editor = NULL)
    {
        return ExecutorFactory::getTaskResult($this, $editor);
    }

    public function tasklists()
    {
        return $this->belongsToMany('App\Tasklist');
    }

}
