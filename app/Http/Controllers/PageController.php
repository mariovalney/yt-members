<?php

namespace App\Http\Controllers;

use App\Auth\GoogleUser;
use App\Services\YouTubeApi;

class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(YouTubeApi $api)
    {
        $user = GoogleUser::retrieve();
        if ($user->isValid()) {
            return view('index')->with([
                'user' => $user,
                'members' => $api->getMembers(),
            ]);
        }

        return redirect(route('login'));
    }

    /**
     * Show the application login.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Logout user and redirect to index.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        GoogleUser::delete();
        return redirect(route('index'));
    }

    /**
     * Show the application privacy.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy()
    {
        return view('privacy');
    }
}
