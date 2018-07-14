<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\CurrentPassword;
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

    public function changePassword(ChangePAsswordRequest $request)
    {
        $validationData = $request->validate([
            'currentPass' => ['required', new CurrentPassword],
            'newPass' => 'required|min:5|max:255'
        ]);
        $user = \Auth::user();
        $user->password = Hash::make($request->newPass);
        $user->save();
        return response()->json($validationData);
    }
}
