<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ===== 注册 =====
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect('/home')->with('success', '注册成功！');
    }

    // ===== 登录 =====
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => '请输入用户名',
            'password.required' => '请输入密码',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // 记录最后登录时间
            $user = Auth::user();
            $user->last_login_at = now();
            $user->save();

            $request->session()->regenerate();
            return redirect('/home')->with('success', '登录成功！');
        }

        return back()->withErrors([
            'username' => '用户名或密码错误',
        ])->onlyInput('username');
    }

    // ===== 退出 =====
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // ===== 主页 =====
    public function home()
    {
        return view('home');
    }
}
