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

        if (Auth::attempt($credentials)) {
            // 1. إعادة تجديد الـ Session ID لحمايتها
            $request->session()->regenerate();

            $user = Auth::user();

            // 2. حفظ الجلسة صراحةً لضمان ثباتها في Serverless (Vercel)
            $request->session()->save();

            // 3. التوجيه حسب دور المستخدم
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
