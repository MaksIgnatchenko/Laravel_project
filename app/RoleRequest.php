<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleRequest extends Model
{
    public function sender() {
    	return $this->hasOne('App\User', 'id', 'sender_id');
    }
}
