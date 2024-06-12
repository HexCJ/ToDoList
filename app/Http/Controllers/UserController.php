<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        // Mengambil pengguna yang sedang login
        $userid = Auth::user()->id;


        $user = User::with('list')->find($userid);
        // Mengambil semua daftar yang dimiliki oleh pengguna
        // $lists = $user->list;

        // Tampilkan hasilnya
        return view('list', compact('user'));
    }
}
