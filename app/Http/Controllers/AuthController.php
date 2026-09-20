<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('login');
    }

    // Menampilkan halaman register
    public function showRegister()
    {
        return view('register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',

            'username' => [
                'required',
                'unique:users,username',
            ],

            // Email wajib diisi
            // Harus memiliki format email
            // Tidak boleh sama dengan email user lain
            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],

            // Tanggal lahir wajib diisi
            // Harus berupa tanggal yang valid
            // Harus sebelum hari ini
            'tanggal_lahir' => [
                'required',
                'date',
                'before:today',
            ],

            'password' => [
                'required',
                'min:6',
                'confirmed',
            ],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama minimal 3 karakter.',

            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir tidak valid.',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Membuat user baru
        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => Hash::make($request->password),

            // User yang mendaftar sendiri
            // selalu mendapatkan role user
            'role' => 'user',
        ]);

        return redirect('/login')
            ->with(
                'success',
                'Registrasi berhasil! Silakan login.'
            );
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Cari user berdasarkan username
        $user = User::where(
            'username',
            $request->username
        )->first();

        // Cek username dan password
        if (
            $user &&
            Hash::check(
                $request->password,
                $user->password
            )
        ) {
            // Login menggunakan Laravel Auth
            Auth::login($user);

            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            return redirect('/home');
        }

        return back()
            ->withErrors([
                'username' => 'Username atau password salah.',
            ])
            ->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}