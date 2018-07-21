<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Image;

class UserController extends Controller
{
    public function test()
    {
        $groups = User::find(2)->groups;
        foreach ($groups as $group) {
            echo "user $group->name, id: $group->id <br>";
        }
    }

    public  function showModules()
    {
        $user = Auth::user();
        $groups = $user->groups;
        $tasklists = [];
        foreach ($groups as $group){
            $tasklists["$group->name"] = $group->tasklists;
        }
       return view('usertasklists', compact('tasklists'));
    }

    public function userProfile(Request $request)
    {
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){

            $avatar = $request->file('avatar');

            /*$im = imagecreatefromjpeg($avatar);

            $imageData = getimagesize($avatar);

            $oldWidth = $imageData[0];
            $oldHeight = $imageData[1];

            if($oldWidth < $oldHeight)
            {
                //*vertical image
                $newWidth = 100;
                $newHeight = 90 * ($oldHeight / $oldWidth) ;
            }
            else
            {
                //*horizontal image
                $newHeight =  90 ;
                $newWidth =  100 * ($oldWidth / $oldHeight) ;
            }*/


            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/images/avatars/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            return back();
        }
    }
}
