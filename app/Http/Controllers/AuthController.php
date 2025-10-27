<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Database\QueryException;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function index(): View
    {
        return view('guest.auth.login-form');
    }

    /**
     * Menampilkan halaman register
     */
    public function showRegister(): View
    {
        return view('guest.auth.register');
    }

    /**
     * Memproses form login
     */
    public function login(Request $request)
    {
        try {
            // Validasi input dengan custom messages bahasa Indonesia
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:255',
                'password' => 'required|min:3'
            ], [
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Format email tidak valid',
                'email.max' => 'Email maksimal 255 karakter',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 3 karakter'
            ]);

            // Cek validasi
            if ($validator->fails()) {
                return redirect('/auth')
                    ->withErrors($validator)
                    ->withInput();
            }

            $email = $request->email;
            $password = $request->password;

            // Cek apakah email ada di database
            $users = User::where('email', $email)->first();

            if (!$users) {
                return redirect('/auth')
                    ->withErrors(['email' => 'Email tidak terdaftar'])
                    ->withInput();
            }

            // Cek password menggunakan Hash::check
            if (!Hash::check($password, $users->password)) {
                return redirect('/auth')
                    ->withErrors(['password' => 'Password salah'])
                    ->withInput();
            }

            // Login berhasil - tampilkan dashboard
            return view('guest.dashboard', [
                'user' => $users,
                'success' => 'Login berhasil! Selamat datang di sistem inventaris.'
            ]);

        } catch (QueryException $e) {
            // Handle database errors
            return redirect('/auth')
                ->withErrors(['database' => 'Terjadi kesalahan sistem. Silakan coba lagi.'])
                ->withInput();
        }
    }

    /**
     * Memproses form register
     */
    public function register(Request $request)
    {
        // try {
            // Validasi input register
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:user',
                'password' => 'required|min:3|confirmed',
                'password_confirmation' => 'required'
            ], [
                'name.required' => 'Nama lengkap tidak boleh kosong',
                'name.max' => 'Nama maksimal 255 karakter',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Format email tidak valid',
                'email.max' => 'Email maksimal 255 karakter',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 3 karakter',
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
                'password_confirmation.required' => 'Konfirmasi password tidak boleh kosong'
            ]);

            // Cek validasi
            if ($validator->fails()) {
                return redirect('/auth/register')
                    ->withErrors($validator)
                    ->withInput();
            }

            // Buat user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Redirect ke halaman login dengan pesan sukses
            return redirect('/auth')
                ->with('success', 'Registrasi berhasil! Silakan login dengan akun Anda.');

        // } catch (QueryException $e) {
        //     // Handle database errors
        //     return redirect('/auth/register')
        //         ->withErrors(['database' => 'Terjadi kesalahan sistem. Silakan coba lagi.'])
        //         ->withInput();
        // }
    }

    /**
     * Logout
     */
    public function logout()
    {
        return redirect('/auth')
            ->with('success', 'Anda telah logout dari sistem.');
    }
}
