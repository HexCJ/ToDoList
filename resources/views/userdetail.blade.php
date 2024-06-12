@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <h1 class="ms-5 text-2xl font-bold text-center">Detail User : {{$userDetail->username}}</h1>
</div>
<div class="container flex">
<div class="container1 me-10" style="width:550px; margin-left:20px">
    <h1 class="text-xl ">Profile</h1>
    <div class="mb-4">
        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
        <input type="text" id="username" name="username" value="{{$userDetail->username}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
    </div>
    @if($userDetail->profil)
    <div class="mb-4">
        <label for="nama_lengkap" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{$userDetail->profil->nama_lengkap}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
    </div>
    <div class="mb-4">
        <label for="nomor_telp" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telp:</label>
        <input type="text" id="nomor_telp" name="nomor_telp" value="{{$userDetail->profil->nomor_telp}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
    </div>
    @else
    <div class="mb-4">
        <label for="nama_lengkap" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
    </div>
    <div class="mb-4">
        <label for="nomor_telp" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telp:</label>
        <input type="text" id="nomor_telp" name="nomor_telp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
    </div>
    @endif
    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
        <input type="text" id="email" name="email" value="{{$userDetail->email}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
    </div>
    @if($userDetail->profil)
    <div class="mb-4">
        <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="{{$userDetail->profil->alamat}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
    </div>
    @else
    <div class="mb-4">
        <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
        <input type="text" id="alamat" name="alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required disabled>
    </div>
    @endif
</div>
    
<div class="container2" style="margin-left:20px">
    <h1 class="text-xl">List yang dimiliki</h1>
    <table class="table-auto border text-start me-5 mt-4" style="width:600px;">
        <thead class="border bg-gray-200">
            <tr>
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">List</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($userDetail->list as $list)
            <tr class="border">
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $list->nama_list }}</td>
                <td class="border px-4 py-2 text-center">
                    <button class="text-blue-500 hover:text-blue-700" onclick="openEditModal('{{ $list->id }}', '{{ $list->nama_list }}')">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <button class="text-green-500 hover:text-green-700" onclick="confirmDelete('{{ $list->id }}')">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td class="border px-4 py-2 text-center" colspan="3">
                    <h1 class="text-xl">User ini belum membuat list</h1>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

</div>
<div class="right-1">
    <a href="{{ route('userall') }}"  class="right-1">Back to all users</a>
</div>
@endsection
