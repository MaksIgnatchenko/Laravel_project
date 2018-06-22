<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    public function test()
    {
        dd(Group::find(2)->users);
    }
}
