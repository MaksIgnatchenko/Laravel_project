<?php

namespace App\Http\Controllers;

use App\Tasklist;
use Illuminate\Http\Request;
use App\Group;
use App\User;

class GroupController extends Controller
{
    public function index($error = null)
    {
        $groups = Group::all();
        $tasklists = Tasklist::all();
        return view('admingroup', compact('groups', 'tasklists', 'error'));
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

    public function addTasklist(Request $request)
    {
        $group = Group::find($request->group_id);
        $tasklist = Tasklist::find($request->choose_tasklist);
        $group->tasklists()->attach($tasklist->id);
        return redirect()->route('groups');
    }
}