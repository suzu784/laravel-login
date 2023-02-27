<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginFormRequest;

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
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->route('home')
        ->with('success', 'ログインに成功しました！');
    }

    return back()->withErrors([
      'danger' => 'メールアドレスかパスワードが間違っています。',
    ]);
  }

  /**
   * ユーザーをアプリケーションからログアウトさせる
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('showLogin')
    ->with('danger', 'ログアウトしました！');
  }
}
