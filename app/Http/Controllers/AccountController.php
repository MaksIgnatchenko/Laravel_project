<?php

namespace App\Http\Controllers;
use App\Http\Requests\ChangeMailRequest;
use App\Http\Requests\ChangePassRequest;
use App\Http\Requests\ChangeNameRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        return view('account');
    }


    public function changePassword(ChangePassRequest $request)
    {
        $user = \Auth::user();
        $user->password = Hash::make($request->newPass);
        $user->save();
        return response()->json($request);
    }

    public function changeMail(ChangeMailRequest $request)
    {
        $user = \Auth::user();
        $user->email = $request->newMail;
        $user->save();
        return response()->json(true);
    }

    public function changeName(ChangeNameRequest $request)
    {
        $user = \Auth::user();
        $user->name = $request->newName;
        $user->save();
        return response()->json(true);
    }
    public function users()
    {
        $users = User::all();
        return response()->json($users);
    }
}
