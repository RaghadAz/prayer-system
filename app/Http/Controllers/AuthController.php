<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = trim($request->input('username'));

        // جلب المستخدم بمرونة كاملة
        $user = User::whereRaw('LOWER(username) = ?', [strtolower($username)])->first();

        if ($user) {
            // دخول مباشر وتسجيل الجلسة
            Auth::login($user);
            $request->session()->regenerate();
            $request->session()->save();

            $role = strtolower(trim($user->role));

            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($role === 'teacher') {
                return redirect()->route('teacher.dashboard');
            }

            return redirect()->route('student.home');
        }

        return back()->withErrors(['error' => 'لم يتم العثور على المستخدم: ' . $username]);
    }
}
