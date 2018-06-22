<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function test()
    {
        $groups = User::find(2)->groups;
        foreach ($groups as $group) {
            echo "user $group->name, id: $group->id <br>";
        }
    }
}
