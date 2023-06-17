<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return view(
            'login.main',
            [
                'layout' => 'login'
            ]
        );
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        error_log('Logging In...');
        if (!\Auth::attempt(
            [
                'nokp' => $request->nokp,
                'password' => $request->password
            ]
        )
        ) {
            throw new \Exception('No K/P dan kata laluan tidak tepat.');
        }
    }

    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('login');
    }
}
