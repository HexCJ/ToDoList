<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show()
    {
        // Mengambil pengguna yang sedang login
        $userid = Auth::user()->id;


        $user = User::with('profil')->find($userid);

        // Tampilkan hasilnya
        return view('dashboard', compact('user'));
    }

    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        $data['nama_lengkap'] = $request->nama_lengkap;
        $data['user_id'] = $userid;
        $data['nomor_telp'] = $request->nomor_telp;
        $data['alamat'] = $request->alamat;


        if($list = Profil::create($data)){
            return redirect()->route('dashboard')->with('success', 'Profile berhasil ditambahkan');
        }else{
            return redirect()->route('dashboard')->with('fail', 'Profile gagal ditambahkan');
        }
    }
}
