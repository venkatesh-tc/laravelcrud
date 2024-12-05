<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenController extends Controller
{
    // Show registration form
    public function registration()
    {
        return view('auth.registration');
    }

    // Register a new user
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:12'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $result = $user->save();

        if ($result) {
            return redirect('login')->with('success', 'You have registered successfully.');
        } else {
            return back()->with('fail', 'Something went wrong.');
        }
    }

    // Show login form
    public function login()
    {
        return view('auth.login');
    }

    // Login a user
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password does not match.');
            }
        } else {
            return back()->with('fail', 'This email is not registered.');
        }
    }

    // Show dashboard
    public function dashboard()
    {
        $data = [];
        if (Session::has('loginId')) {
            $data = User::find(Session::get('loginId'));
        }
        return view('dashboard', compact('data'));
    }

    // Logout a user
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
        }
        return redirect('login');
    }
}
