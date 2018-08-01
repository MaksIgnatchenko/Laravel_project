<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try{
            $user = Socialite::driver($provider)->user();
        } catch(\Exception $e)
        {
            return redirect('auth/'.$provider);
        }

        $userAuth = User::firstOrNew(['provider_id'=>$user->id]);

        $userAuth->email = $user->email;
        $userAuth->name = $user->name;
        $userAuth->avatar = $user->avatar;
        $userAuth->provider = $provider;

        $userAuth->save();

        auth()->login($userAuth);
        return redirect()->route('main');
    }
}
