<?php

namespace App\Http\Controllers;

use App\GroupUser;
use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('email', $request->user_email)->get();

        foreach ($user as $user_id) {
            $user_notification = GroupUser::where('user_id', $user_id->id)->where('processed', null)->first();

            var_dump($user_notification);
            die();

            if($user_notification) {
                return response()->json(true);
            } else {
                return response()->json(false);
            }
        }

    }
}
