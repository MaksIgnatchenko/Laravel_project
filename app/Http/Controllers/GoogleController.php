<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch(\Exception $e)
        {
            return redirect('auth/google');
        }

        $authUser = $this->createUser($user);

        Auth::login($authUser, true);
        return redirect()->route('main');
    }

    public function createUser($userData)
    {
        if ( $user = $this->userRecordExists($userData) ) {
            $user->google_id = $userData->id;
            $user->name = $userData->name;
            $user->avatar = $userData->avatar;
            $user->save();

            return $user;
        }

        return $this->user->firstOrCreate([
            'email'      => $userData->email,
            'google_id'  => $userData->id,
            'name'       => $userData->name,
            'avatar'     => $userData->avatar
        ]);
    }

    private function userRecordExists($userData)
    {
        return User::where('email', $userData->email)->first();
    }
}