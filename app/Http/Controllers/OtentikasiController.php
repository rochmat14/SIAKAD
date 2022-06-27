<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OtentikasiController extends Controller
{
    public function login(Request $request){
        // mendapatkan request hanya username dan password
        $credentials = $request->only('username', 'password');
        
        // jika login dan berhasil
        if (Auth::attempt($credentials)) {

            session(['berhasil-login' => true]);

            // mengalihkan pada halaman url '/home'
            return redirect()->intended('/home');
        }
            // jika gagal login maka mengarakan pada url '/' dan mengairim message 
            return redirect('/')->with('message', "username atau password salah");
    }

    public function logout(Request $request){
        // logout dari halaman dashboard
        Auth::logout();

        // manghaps session ketika logout
        Session::flush();

        // mengarahkan ke halaman awal ketika logout
        return redirect('/');
    }
}
