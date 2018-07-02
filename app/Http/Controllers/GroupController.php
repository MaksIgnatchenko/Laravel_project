<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;

class GroupController extends Controller
{
    public function index($error = null)
    {
        $groups = Group::all();
        return view('admingroup', compact('groups', 'error'));
    }

    public function create(Request $request)
    {
        $group = new Group();
        $group->name = $request->groupName;
        $group->save();
        return redirect()->route('groups');
    }

    public function addUser(Request $request)
    {
        $group = Group::find($request->group_id);
        $user = User::where('email', $request->user_email)->first();
        if (!$user) {
            return redirect()->route('groups', ['error' => 'No such user']);
        }
        if ($group->users->firstWhere('id', $user->id)) {
            return redirect()->route('groups', ['error' => 'This user is already exists in the group']);
        }
        $group->users()->attach($user->id);
        return redirect()->route('groups');
    }
}

