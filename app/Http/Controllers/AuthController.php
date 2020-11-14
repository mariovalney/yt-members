<?php

namespace App\Http\Controllers;

use App\Auth\GoogleUser;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Redirect to login
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        $scopes = [
            'https://www.googleapis.com/auth/youtube.channel-memberships.creator',
        ];

        return Socialite::driver('google')->scopes($scopes)->redirect();
    }

    /**
     * Failed
     *
     * @return \Illuminate\Http\Response
     */
    public function failed()
    {
        abort(403, __('auth.google.failed'));
    }

    /**
     * Callback authentication
     *
     * @return \Illuminate\Http\Response
     */
    public function authentication()
    {
        $user = Socialite::driver('google')->user();
        if (! empty($user) && ! empty($user->token)) {
            $user = new GoogleUser((array) $user);
            $user->save();

            return redirect(route('index'));
        }

        return redirect(route('auth.failed'));
    }
}
