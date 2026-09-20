<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Menampilkan semua user
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }


    // Menampilkan form tambah user
    public function create()
    {
        return view('users.create');
    }


    // Menyimpan user baru
    public function store(Request $request)
    {
        $request->validate([

            'nama' => [
                'required',
                'min:3',
            ],

            'username' => [
                'required',
                'unique:users,username',
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],

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

            'role' => [
                'required',
                'in:admin,user',
            ],

        ], [

            'nama.required' =>
                'Nama wajib diisi.',

            'nama.min' =>
                'Nama minimal 3 karakter.',

            'username.required' =>
                'Username wajib diisi.',

            'username.unique' =>
                'Username sudah digunakan.',

            'email.required' =>
                'Email wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'email.unique' =>
                'Email sudah digunakan.',

            'tanggal_lahir.required' =>
                'Tanggal lahir wajib diisi.',

            'tanggal_lahir.date' =>
                'Tanggal lahir tidak valid.',

            'tanggal_lahir.before' =>
                'Tanggal lahir harus sebelum hari ini.',

            'password.required' =>
                'Password wajib diisi.',

            'password.min' =>
                'Password minimal 6 karakter.',

            'password.confirmed' =>
                'Konfirmasi password tidak cocok.',

            'role.required' =>
                'Role wajib dipilih.',

            'role.in' =>
                'Role tidak valid.',

        ]);


        // Membuat user baru
        User::create([

            'nama' =>
                $request->nama,

            'username' =>
                $request->username,

            'email' =>
                $request->email,

            'tanggal_lahir' =>
                $request->tanggal_lahir,

            'password' =>
                Hash::make(
                    $request->password
                ),

            'role' =>
                $request->role,

        ]);


        return redirect('/admin/users')
            ->with(
                'success',
                'User berhasil ditambahkan!'
            );
    }


    // Menampilkan form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view(
            'users.edit',
            compact('user')
        );
    }


    // Memperbarui user
    public function update(
        Request $request,
        $id
    ) {
        $user = User::findOrFail($id);


        $request->validate([

            'nama' => [
                'required',
                'min:3',
            ],

            'username' => [
                'required',

                Rule::unique(
                    'users',
                    'username'
                )->ignore($user->id),
            ],

            'email' => [
                'required',
                'email',

                Rule::unique(
                    'users',
                    'email'
                )->ignore($user->id),
            ],

            'tanggal_lahir' => [
                'required',
                'date',
                'before:today',
            ],

            'role' => [
                'required',
                'in:admin,user',
            ],

            'password' => [
                'nullable',
                'min:6',
                'confirmed',
            ],

        ], [

            'nama.required' =>
                'Nama wajib diisi.',

            'nama.min' =>
                'Nama minimal 3 karakter.',

            'username.required' =>
                'Username wajib diisi.',

            'username.unique' =>
                'Username sudah digunakan.',

            'email.required' =>
                'Email wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'email.unique' =>
                'Email sudah digunakan.',

            'tanggal_lahir.required' =>
                'Tanggal lahir wajib diisi.',

            'tanggal_lahir.date' =>
                'Tanggal lahir tidak valid.',

            'tanggal_lahir.before' =>
                'Tanggal lahir harus sebelum hari ini.',

            'role.required' =>
                'Role wajib dipilih.',

            'role.in' =>
                'Role tidak valid.',

            'password.min' =>
                'Password minimal 6 karakter.',

            'password.confirmed' =>
                'Konfirmasi password tidak cocok.',

        ]);


        // Update data dasar
        $user->nama =
            $request->nama;

        $user->username =
            $request->username;

        $user->email =
            $request->email;

        $user->tanggal_lahir =
            $request->tanggal_lahir;

        $user->role =
            $request->role;


        // Password hanya diubah
        // jika password baru diisi
        if ($request->filled('password')) {

            $user->password =
                Hash::make(
                    $request->password
                );
        }


        $user->save();


        return redirect('/admin/users')
            ->with(
                'success',
                'User berhasil diperbarui!'
            );
    }


    // Menghapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);


        // Admin tidak boleh
        // menghapus akun sendiri
        if ($user->id === Auth::id()) {

            return back()->with(
                'error',
                'Kamu tidak dapat menghapus akun yang sedang digunakan.'
            );
        }


        $user->delete();


        return redirect('/admin/users')
            ->with(
                'success',
                'User berhasil dihapus!'
            );
    }
}