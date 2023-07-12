<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('auth.login',['title' => 'Admin','route' => route('admin.login')]);
    }
    public function login(Request $request)
    {
        $credential = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($credential, $request->filled('remember'))) {
            return redirect()->route('admin.dashboard');
        } else {
            throw ValidationException::withMessages([
                'email' => 'invalid email or password'
            ]);
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login.form'));
    }
}
