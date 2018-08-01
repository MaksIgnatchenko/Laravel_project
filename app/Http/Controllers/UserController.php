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
            list($oldWidth,$oldHeight) = getimagesize($avatar);
            if($oldWidth < $oldHeight)
            {
                //*vertical image
                $newWidth = $oldWidth;
                $newHeight = $oldHeight;
                $startX = 0;
                $startY = 0;
            }
            else
            {
                //*horizontal image
                $newHeight =  $oldHeight ;
                $newWidth =  $oldWidth ;
                $startX = ( $oldWidth - $newHeight ) / 2;
                $startY = 0;
            }
            $thumb = imagecreatetruecolor($newWidth, $newHeight);
            $im = imagecreatefromjpeg($avatar);
            imagecopyresampled($thumb, $im, 0,0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);
            if($oldWidth < $oldHeight) {
                $im = imagecrop($thumb, ['x' => $startX, 'y' => $startY, 'width' => $newWidth, 'height' => $newHeight]);
            }else{
                $im = imagecrop($thumb,['x' => $startX, 'y' => $startY, 'width' => $oldHeight, 'height' => $oldHeight]);
            }
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $filename_big = time() . '_big.' . $avatar->getClientOriginalExtension();
            Image::make($im)->save( public_path('/images/avatars/' . $filename ) );
            Image::make($avatar)->save( public_path('/images/avatars/' . $filename_big ));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
            return back();
        }
    }
    public function deleteUser(User $user)
    {
        $user->delete();
        return back();
    }
}