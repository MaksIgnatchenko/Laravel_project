<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function test()
    {
        $groups = User::find(2)->groups;
        foreach ($groups as $group) {
            echo "user $group->name, id: $group->id <br>";
        }
    }

    public  function showModules()
    {
        $user = Auth::user();
        $groups = $user->groups;
        foreach ($groups as $group){
            $tasklists["$group->name"] = $group->tasklists;
        }
       return view('usertasklists', compact('tasklists'));
    }
}
