<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('admingroup', compact('groups'));
    }

    public function create(Request $request)
    {
        $group = new Group();
        $group->name = $request->groupName;
        $group->save();
        return redirect()->route('groups');
    }

}
