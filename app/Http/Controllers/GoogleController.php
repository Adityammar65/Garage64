<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // Redirect ke Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari user berdasarkan email
            $user = UserModel::where('email', $googleUser->getEmail())->first();

            // Kalau belum ada, buat akun baru
            if (!$user) {

                $user = UserModel::create([
                    'username' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => Hash::make(Str::random(16)),
                    'role' => 'customer',
                    'alamat' => '',
                    'no_hp' => '',
                ]);

            } else {

                // Simpan google_id jika belum ada
                if (!$user->google_id) {
                    $user->google_id = $googleUser->getId();
                    $user->save();
                }

            }

            // Login menggunakan session yang sama seperti sistem kamu
            Session::put([
                'login'    => true,
                'id_user'  => $user->id_user,
                'username' => $user->username,
                'email'    => $user->email,
                'role'     => $user->role,
                'alamat'   => $user->alamat,
                'no_hp'    => $user->no_hp,
            ]);

            return redirect('/produk');

        } catch (\Exception $e) {

            return redirect('/login')
                ->with('error', 'Login Google gagal.');

        }
    }
}