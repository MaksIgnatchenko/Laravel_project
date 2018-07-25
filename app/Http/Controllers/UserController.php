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
                $newWidth = 65;
                $newHeight = 65 * ($oldHeight / $oldWidth) ;
                $startX = 0;
                $startY = ( $newHeight - 80 ) / 2;
            }
            else
            {
                //*horizontal image
                $newHeight =  80 ;
                $newWidth =  80 * ($oldWidth / $oldHeight) ;
                $startX = ( $newWidth - 65 ) / 2;
                $startY = 0;
            }
            $thumb = imagecreatetruecolor($newWidth, $newHeight);
            $im = imagecreatefromjpeg($avatar);
            imagecopyresampled($thumb, $im, 0,0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);
            $im = imagecrop($thumb,['x' => $startX, 'y' => $startY, 'width' => 65, 'height' => 80]);
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($im)->save( public_path('/images/avatars/' . $filename ) );
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