<?php

namespace App\Http\Controllers;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm() 
    {
        return view('auth.login');
    }

    public function registForm() 
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm' => 'required|same:password',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        User::create($data);
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if(!$user || !Hash::check($request->input('password'), $user->password)) {
            return redirect()->route('login')->with('error', 'Email dan password tidak sesuai!');
        }

        Auth::login($user);

        if($user->role == 'user') {
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    public function logout() 
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function changePassword(Request $request, string $id)
    {
        $request->validate([
            'current' => 'required',
            'password' => 'required',
            'confirm' => 'same:password'
        ]);

        $user = User::where('id', $id);
        $user->update(['password' => Hash::make($request->input('password'))]);

        Alert::success('Update Password', 'Password berhasil diperbarui');

        return redirect()->route('user.dashboard');
    }
}
