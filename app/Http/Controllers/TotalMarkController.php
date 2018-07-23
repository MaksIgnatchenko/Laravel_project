<?php

namespace App\Http\Controllers;

use App\Group;
use App\Tasklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotalMarkController extends Controller
{
    public function index(Group $group)
    {

        $tasklists = $group->tasklists;
        $users = $group->users;
            foreach ($users as $user) {
                foreach ($tasklists as $tasklist) {
                $array[$user->name][$tasklist->name] = $group->rate($user, $tasklist);
//                print_r($group->rate($user, $tasklist)->toArray());
//                echo "<br>";
            }
        }


        $rate = $group->rate($user, $tasklist);

        return view('total_marks', compact('group', 'array', 'tasklists'));
    }
}
