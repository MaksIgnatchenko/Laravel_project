<?php

namespace App;

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
}
