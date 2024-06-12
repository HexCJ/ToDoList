@include('layouts.app')
@section('content')

@if($user->profil)
<h1 class="text-2xl font-bold ms-5 mb-3">Profil anda</h1>
<div class="ms-5 flex">
    <div class="container1" style="width:800px">
    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
        <input type="text" id="name" name="name" value="{{$user->name}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="nama_lengkap" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{$user->profil->nama_lengkap}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="nomor_telp" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telp:</label>
        <input type="text" id="nomor_telp" name="nomor_telp" value="{{$user->profil->nomor_telp}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
        <input type="text" id="email" name="email" value="{{$user->email}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="{{$user->profil->alamat}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    </div>
    <div class="container2">
    <div class="ms-5 h-96">
        <img src="{{ asset('image/listanimate.png') }}" alt="Working Person Animation" class="w-96">
    </div>
</div>

</div>
@else
<h1 class="text-2xl font-bold ms-5 mb-3">Lengkapi Profil anda</h1>
<div class="w-96 ms-5">
<form method="POST" action="{{ route('tambah_profile') }}">
    @csrf
    <div class="mb-4">
        <label for="nama_lengkap" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="nomor_telp" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telp:</label>
        <input type="text" id="nomor_telp" name="nomor_telp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">alamat:</label>
        <input type="text" id="alamat" name="alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="flex justify-end">
        <button type="button" id="closeModalBtn2" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
    </div>
</form>
</div>
@endif