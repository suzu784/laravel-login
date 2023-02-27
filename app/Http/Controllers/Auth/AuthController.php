<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * ログイン画面を表示
     *
     * @return view
     */
    public function showLogin()
    {
      return view('login.login_form');
    }

    /**
     * ログイン処理
     * @param App\Http\Requests\LoginFormRequest
     * @return view
     */
    public function login(LoginFormRequest $request)
    {
      dd($request->all());
    }
}
