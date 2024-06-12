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

    public function showall()
    {
        // Mengambil pengguna yang sedang login
        $alluser = User::with('profil', 'list')->paginate(10);
        $userid = Auth::user()->id;


        $user = User::with('list')->find($userid);
        // Mengambil semua daftar yang dimiliki oleh pengguna
        // $lists = $user->list;

        // Tampilkan hasilnya
        return view('userall', compact('user'),[
            'userall' => $alluser,
        ]);
    }

    public function showUserDetail($id)
    {
    // Mengambil pengguna berdasarkan ID dengan profil dan daftar mereka
    $userDetail = User::with('profil', 'list')->findOrFail($id);

    // Tampilkan hasilnya
    return view('userdetail', compact('userDetail'));
    }
}
