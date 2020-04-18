$(document).ready(function(){

    //TAMBAH MAHASISWA
    $('.tombol-simpan').click(function(){
        var data = $('.form-mahasiswa').serialize();
        $.ajax({
            type: 'POST',
            url: '/tambah-mahasiswa',
            data: data,
            success: function(){

            }
        });
    });

    //TABEL MAHASISWA
    $('#tabel_mahasiswa').DataTable({
        processing : true,
        serverSide : true,
        ajax: '/mahasiswa/get-data',
        columns: [
            { data: 'nama', name: 'nama' },
            { data: 'alamat', name: 'alamat' },
        ]
    });

});
