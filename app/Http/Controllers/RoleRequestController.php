<?php

namespace App\Http\Controllers;

use App\RoleRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CheckRoleRequest;

class RoleRequestController extends Controller
{
    public function index()
    {
        $users = User::all();
        $teachers = User::where('role', 'teacher')->get();

        $roleRequests = RoleRequest::whereNull('processed')->get();
        if (count($roleRequests) > 0) {
            // return view('requests', compact('roleRequests'));
            return view('requests', compact('roleRequests'));
        } else {
            $noRequests = 'There are no unprocessed requests for teacher role at this moment';
            return view('requests', compact('noRequests', 'teachers', 'users'));
        }
    }
    
    
    public function store(CheckRoleRequest $request)
    {
        $user_id = \Auth::id();
        $roleRequest = new RoleRequest();
        $roleRequest->sender_id = $user_id;
        $roleRequest->save();
        return response()->json($roleRequest);
    }

    public function checkRequests(Request $request)
    {
        $roleRequests = RoleRequest::whereNull('processed')->first();
        if ($roleRequests) {
            return response()->json(true);
        } else {
        return response()->json(false);           
        }
    }   
    
    public function applyRequest(Request $request)
    {
        $roleRequest = RoleRequest::find($request->requestId);
        $roleRequest->processed = 1;
        $roleRequest->apply = 1;
        $roleRequest->save();
        $user = User::find($roleRequest->sender_id);
        $user->role = 'teacher';
        $user->save();
        return response()->json($roleRequest);
    }  
    
    public function declineRequest(Request $request)
    {
        $roleRequest = RoleRequest::find($request->requestId);
        $roleRequest->processed = 1;
        $roleRequest->decline = 1;
        $roleRequest->save();
    }

    public function changeRole(User $user)
    {
        $user->role = 'user';
        $user->save();
        return back();
    }
}
