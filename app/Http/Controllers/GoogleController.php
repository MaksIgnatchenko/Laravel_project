<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
            dd($user);
        } catch(\Exception $e)
        {
            return redirect('auth/google');
        }

        $authUser = $this->createUser($user);

        Auth::login($authUser, true);
        return redirect()->route('home');
    }

    public function createUser($user)
    {
        $userAuth = User::where('google_id', $user->id )->first();

        if($userAuth)
        {
            return $userAuth;
        }

        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'google_id' => $user->id,
            'avatar' => $user->avatar
        ]);

    }
}