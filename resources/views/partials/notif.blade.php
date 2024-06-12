@if(session('fail'))
    <script>
        Swal.fire({
            title: "Gagal!",
            text: "{{ session('fail') }}!",
            background: '#FFFDD7',
            color: '#0C0C0C',
            confirmButtonColor: '#E72929',
            icon: "error"
        });
    </script>
@elseif(session('success'))
    <script>
        Swal.fire({
            title: "Tambah data berhasil!",
            text: "{{ session('success') }}!",
            background: '#FFFDD7',
            color: '#0C0C0C',
            confirmButtonColor: '#E72929',
            icon: "success"
        });
    </script>
@elseif(session('success-update'))
    <script>
        Swal.fire({
            title: "Update data berhasil!",
            text: "{{ session('success-update') }}!",
            background: '#FFFDD7',
            color: '#0C0C0C',
            confirmButtonColor: '#E72929',
            icon: "success"
        });
    </script>
@elseif(session('success-delete'))
    <script>
        Swal.fire({
            title: "Hapus data berhasil!",
            text: "{{ session('success-delete') }}!",
            background: '#FFFDD7',
            color: '#0C0C0C',
            confirmButtonColor: '#E72929',
            icon: "successd"
        });
    </script>
@elseif(session('success-register'))
    <script>
        Swal.fire({
            title: "Register berhasil!",
            text: "{{ session('success-delete') }}!",
            background: '#FFFDD7',
            color: '#0C0C0C',
            confirmButtonColor: '#E72929',
            icon: "successd"
        });
    </script>
@elseif(session('fail-register'))
<script>
    Swal.fire({
        title: "Gagal!",
        text: "{{ session('fail') }}!",
        background: '#FFFDD7',
        color: '#0C0C0C',
        confirmButtonColor: '#E72929',
        icon: "error"
    });
</script>
@endif