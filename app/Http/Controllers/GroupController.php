<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    public function test()
    {
        $users = Group::find(3)->users;
        foreach ($users as $user) {
            echo "user $user->name, id: $user->id <br>";
        }
    }
}
