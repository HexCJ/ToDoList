@extends('layouts.app')
@section('content')

<div class="mt-20">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold mt-2 mb-2 ms-3">To Do List anda</h1>
        <button id="openModalBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded me-5">
            Tambah
        </button>

    </div>

        <table class="table-auto border w-full text-start  me-5">
            <thead class="border bg-gray-200">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">List</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user->list as $list)
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
                    <td class="border px-4 py-2 text-center" colspan="3"><h1 class="text-xl">Anda belum membuat list</h1></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Add -->
<div id="addModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold">Tambah Item</p>
            <button id="closeModalBtn" class="text-gray-600 font-bold">&times;</button>
        </div>
        <form method="POST" action="{{ route('tambah_list') }}">
            @csrf
            <div class="mb-4">
                <label for="nama_list" class="block text-gray-700 text-sm font-bold mb-2">Nama List:</label>
                <input type="text" id="nama_list" name="nama_list" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex justify-end">
                <button type="button" id="closeModalBtn2" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold">Edit Item</p>
            <button id="closeEditModalBtn" class="text-gray-600 font-bold">&times;</button>
        </div>
        <form method="POST" action="{{ route('update_list',['id' => $user->id]) }}">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit_list_id" name="id">
            <div class="mb-4">
                <label for="edit_nama_list" class="block text-gray-700 text-sm font-bold mb-2">Nama List:</label>
                <input type="text" id="edit_nama_list" name="nama_list" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex justify-end">
                <button type="button" id="closeEditModalBtn2" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Batal</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtns = document.querySelectorAll('#closeModalBtn, #closeModalBtn2');
        const addModal = document.getElementById('addModal');

        const closeEditModalBtns = document.querySelectorAll('#closeEditModalBtn, #closeEditModalBtn2');
        const editModal = document.getElementById('editModal');

        openModalBtn.addEventListener('click', () => {
            addModal.classList.remove('hidden');
        });

        closeModalBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                addModal.classList.add('hidden');
            });
        });

        closeEditModalBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                editModal.classList.add('hidden');
            });
        });
    });

    function openEditModal(id, nama_list) {
        const editModal = document.getElementById('editModal');
        const editListId = document.getElementById('edit_list_id');
        const editNamaList = document.getElementById('edit_nama_list');

        editListId.value = id;
        editNamaList.value = nama_list;

        editModal.classList.remove('hidden');
    }


    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Apakah Anda Telah Menyelesaikan Tugas Ini!?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#059212',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Belum'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect or form submission for deletion
                window.location.href = '/list/delete/' + id;
            }
        })
    }
</script>

@endsection

    
