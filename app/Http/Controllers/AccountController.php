<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect(url('/login'));
        }
        $user = Auth::user();
        return view('account', compact('user'));
    }

    public function changePassword(Request $request)
    {
        if (!Auth::check()) {
            return false;
        }
        $user = Auth::user();
        if (!Hash::check($request->currentPass, $user->password)) {
            return response()->json(['status' => 'error']);
        } else {
            $newPass = $request->newPass;
            $user->password = bcrypt($newPass);
            $user->save();
            return response()->json(['status' => 'ok']);
        }
    }
}
