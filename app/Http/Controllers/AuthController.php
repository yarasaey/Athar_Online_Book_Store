<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('front.auth.register'); // نفس الصفحة تحتوي على login/register
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:website_users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = WebsiteUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('website_user')->login($user);
        return redirect()->route('login.form')->with('success', 'تم إنشاء الحساب بنجاح!');
    }

    public function showLoginForm()
    {
        return view('front.auth.register'); // نفس الصفحة فيها login/register
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('website_user')->attempt($credentials)) {
            return redirect()->intended('/')->with('success', 'تم تسجيل الدخول بنجاح!');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
      
    Auth::guard('website_user')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect('/')->with('success', 'تم تسجيل الخروج بنجاح!');}
}
