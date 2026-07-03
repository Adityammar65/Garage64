<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\UserModel;

class AuthController extends Controller
{
    // LOGIN
    public function login(){
        return view('auth.login');
    }

    public function cekLogin(Request $request) {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ],[
            'login.required' => 'Username/Email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $user = UserModel::where('username', $request->login)
            ->orWhere('email', $request->login)
            ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()
                ->with('error', 'Username/Email atau password salah.')
                ->withInput();
        }

        Session::put([
            'login'    => true,
            'id_user'  => $user->id_user,
            'name'     => $user->name,
            'username' => $user->username,
            'email'    => $user->email,
            'role'     => $user->role,
        ]);

        if ($request->has('remember')) {
            $token = Str::random(60);
            $user->remember_token = $token;
            $user->save();

            Cookie::queue(
                'remember_token',
                $token,
                60 * 24 * 30
            );
        } else {
            Cookie::queue(Cookie::forget('remember_login'));
        }

        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        return redirect('/');
    }

    // REGISTER
    public function register() {
        return view('auth.register');
    }

    public function saveRegister(Request $request){
        $request->validate([
            'username' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'persetujuan' => 'accepted',
        ],[
            'email.unique' => 'Email sudah digunakan',
            'email.required' => 'Email harus diisi',
            'persetujuan.accepted' => 'Anda harus menyetujui syarat dan ketentuan',
            'username.required' => 'Username harus diisi',
            'username.min' => 'Username minimal 3 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $user = UserModel::create([
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 'customer',
        ]);

        Session::put([
            'login'    => true,
            'id_user'  => $user->id_user,
            'username' => $user->username,
            'email'    => $user->email,
            'role'     => $user->role,
        ]);

        $token = Str::random(60);
        $user->remember_token = $token;
        $user->save();

        Cookie::queue(
            'remember_token',
            $token,
            60 * 24 * 30 // 30 hari
        );

        return redirect('/')
            ->with('success', 'Registrasi berhasil');
    }

    // LOGOUT
    public function logout()
    {
        $user = UserModel::find(Session::get('id_user'));

        if ($user) {
            $user->remember_token = null;
            $user->save();
        }

        Cookie::queue(Cookie::forget('remember_token'));
        Session::flush();

        return redirect('/login');
    }
}
