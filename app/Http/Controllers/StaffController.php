<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class StaffController extends Controller
{
    public function loginForm()
    {
        return view('auth.login', ['title' => 'Admin', 'route' => route('staff.login')]);
    }
    public function login(Request $request)
    {
        $credential = $request->only(['email', 'password']);
        if (Auth::guard('staff')->attempt($credential, $request->filled('remember'))) {
            return redirect()->route('staff.dashboard');
        } else {
            throw ValidationException::withMessages([
                'email' => 'invalid email or password'
            ]);
        }
    }

    public function dashboard()
    {
        return view('staff.dashboard');
    }

    public function logout()
    {
        Auth::guard('staff')->logout();
        return redirect(route('staff.login.form'));
    }
}
