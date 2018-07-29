<?php

namespace App\Http\Controllers;

use App\Tasklist;
use Illuminate\Http\Request;
use App\Group;
use App\User;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index(Request $request, $error = null)
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
        if($request->has('delete')) {
            $group = Group::find($request->group_id);
            $user = User::where('email', $request->user_email)->first();
            $group->users()->detach($user->id);
            return redirect()->route('groups');
        }
        $group = Group::find($request->group_id);
        $user = User::where('email', $request->user_email)->first();
        if (!$user) {
            return redirect()->route('groups', ['error' => 'No such user']);
        }
        if ($group->users->firstWhere('id', $user->id)) {
            return redirect()->route('groups', ['error' => 'This user is already exists in the group']);
        }
        $group->users()->attach($user->id, [ 'created_at' => now(),'updated_at' => now()]);
        return redirect()->route('groups');
    }

    public function addTasklist(Request $request)
    {
        $group = Group::find($request->group_id);
        $tasklist = Tasklist::find($request->choose_tasklist);

        if($group->tasklists->firstWhere('id', $tasklist->id)) {
            return redirect()->route('groups', ['error' => 'This module has been already added to this group']);
        }
        $group->tasklists()->attach($tasklist->id, [ 'created_at' => now(),'updated_at' => now()]);
        return redirect()->route('groups');
    }

    public function deleteGroup(Group $group)
    {
        $group->delete();
        return back();
    }

    public function deleteTasklist(Request $request)
    {
        /*dd($request->group_id, $request->delete_tasklist);*/
        $group = Group::find($request->group_id);
        $tasklist = Tasklist::find($request->delete_tasklist);
        $group->tasklists()->detach($tasklist->id);
        return redirect()->route('groups');
    }

}