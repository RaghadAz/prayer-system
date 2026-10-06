<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $user = \App\Models\User::whereRaw('LOWER(username) = ?', [strtolower($request->username)])->first();
        if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            // تسجيل الدخول يدوياً وتجديد الجلسة
            Auth::login($user);
            $request->session()->regenerate();
            $request->session()->save();

            // التوجيه بحسب الدور (Role)
            $role = strtolower(trim($user->role));
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role === 'teacher') {
                return redirect()->route('teacher.dashboard');
            }

            if ($user->role === 'student') {
                return redirect()->route('student.home');
            }

            return redirect()->route('login');
        }

        return back()->withErrors(['error' => 'اسم المستخدم أو كلمة السر غير صحيحة']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
