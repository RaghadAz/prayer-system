<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = trim($request->input('username'));
        $password = $request->input('password');

        $user = User::whereRaw('LOWER(username) = ?', [strtolower($username)])->first();

        if ($user && Hash::check($password, $user->password)) {

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

            if ($role === 'student') {
                return redirect()->route('student.home');
            }

            return redirect()->route('student.dashboard');
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
