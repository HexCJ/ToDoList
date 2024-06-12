<?php

namespace App\Http\Controllers;

use App\Models\ListUp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
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

    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        $data['nama_list'] = $request->nama_list;
        $data['user_id'] = $userid;

        if($list = ListUp::create($data)){
            return redirect()->route('list')->with('success', 'List berhasil ditambahkan');
        }else{
            return redirect()->route('list')->with('fail', 'List gagal ditambahkan');
        }
    }

    public function update(Request $request, $id){
        $data = ListUp::find($id);
        $data->nama_list       = $request->nama_list;
        if($data->save()){
            return redirect()->route('list')->with('success-update', 'List berhasil diedit');        
        }
        else{
            return redirect()->route('list')->with('fail', 'List gagal diedit');
        }
    }

    public function destroy($id)
    {
        if (ListUp::destroy($id)) {
            return redirect()->route('list')->with('success-delete', 'List berhasil dihapus');
        } else{
            return redirect()->back()->with('fail', 'List gagal dihapus');
        }
    }
}
