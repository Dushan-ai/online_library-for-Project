<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;

class LoginController extends Controller
{
    //Login
    public function ShowLoginForm()
    {
        return view('auth.login');
    }
    public function LogIn(Request $request){
            $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // First, try to log in as admin
        $admin = Admin::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_id' => $admin->id]);
            return redirect()->intended('/admin/dashboard');
        }

        // Then try to log in as regular user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid Email or Password',
        ]);
    }

    public function LogOut(Request $request){
        Auth::logout();
        session()->forget('admin_id'); // Clear admin session if exists
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // SignUp
    public function ShowSignupForm(){
        return view('auth.signup');
    }
    public function SignUp(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'nic' => 'required|string|max:15',
            'mobile_no' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'nic' => $request->nic,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }

    //Dashboard
    public function ShowDashboard()
    {
        return view('dashboard');
    }
    public function ShowProfile()
    {
        return view('profile');
    }
}
