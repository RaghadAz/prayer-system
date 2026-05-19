<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->role === 'teacher') {
                return redirect()->route('teacher.dashboard');
            }

              if (Auth::user()->role === 'student') {
        return redirect()->route('student.home');
    }
            return redirect()->route('student.dashboard');
        }

        return back()->withErrors(['error' => 'اسم المستخدم أو كلمة السر غير صحيحة']);
    }
protected function authenticated(Request $request, $user)
{$user = Auth::user();
    if ($user->role === 'student') {
        return redirect()->route('student.home');
    }

    if ($user->role === 'teacher') {
        return redirect()->route('teacher.dashboard');
    }

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect('/');
}

    }
