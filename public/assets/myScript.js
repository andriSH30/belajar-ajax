$(document).ready(function(){

    loadMahasiswa();

    //TABEL MAHASISWA
    function loadMahasiswa(){
        $('.load-mahasiswa').load('/mahasiswa/tabel',function(){
            $('.tabel_mahasiswa').DataTable({
                processing : true,
                serverSide : true,
                ajax: '/mahasiswa/get-data',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'nama', name: 'nama' },
                    { data: 'alamat', name: 'alamat' },
                    {data: 'aksi', name: 'aksi', orderable: false, searchable: false},
                ]
            });
        });
    }


    //TAMBAH MAHASISWA
    $('.form-tambah-mahasiswa').on('submit',function (e) {
        e.preventDefault();
        var data = $('.form-tambah-mahasiswa').serialize();
        $.ajax({
          type: "POST",
          url: '/mahasiswa/add',
          data: data,
          success: function (response) {

            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: 'Berhasil Menambahkan Mahasiswa Baru!',
              });
              $('.form-tambah-mahasiswa').trigger("reset");
              $('#modalTambahMahasiswa').modal('hide');
              loadMahasiswa();

          },
          error: function (error) {
              console.log('Error:', error);
              $('#saveBtn').html('Save Changes');
              alert("GAGAL");
          }
      });
    });

});
