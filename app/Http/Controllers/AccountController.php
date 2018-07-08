<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('account', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $newPass = $request->newPass;
        $user = Auth::user();
        $user->password = bcrypt($newPass);
        $user->save();
    }
}
