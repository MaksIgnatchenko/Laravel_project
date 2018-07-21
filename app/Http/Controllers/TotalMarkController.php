<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotalMarkController extends Controller
{
    public function index(Group $group)
    {
        $user = Auth::user();

        dd($user->tasklists);

        return view('total_marks', compact('group'));
    }
}
