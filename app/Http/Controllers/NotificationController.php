<?php

namespace App\Http\Controllers;

use App\GroupUser;
use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {

        $user = User::where('id', $request->user_id)->first();
        $user_id = $user->id;

        $user_notification = GroupUser::where('user_id', $user_id)->where('processed', null)->first();

        if($user_notification) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }

    public function stopProcessed(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $user_id = $user->id;

        $stop = GroupUser::where('user_id', $user_id)->update(['processed' => 1]);
    }
}
