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


    //DELETE MAHASISWA
    $('body').on('click','.deleteMahasiswa',function(){
        var mahasiswa_id = $(this).data("id");
        var mahasiswa_nama = $(this).data("nama");
        Swal.fire({
            title: 'Peringatan',
            text: "Kamu yakin mau menghapus "+mahasiswa_nama+" ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "GET",
                    url: "/mahasiswa/delete/"+mahasiswa_id,
                    success: function(data){

                        Swal.fire(
                            'Sukses!',
                            'Berhasil menghapus '+mahasiswa_nama,
                            'success'
                          )
                          loadMahasiswa();
                    },
                    error: function(data){
                        Swal.fire(
                            'Oops!',
                            'Error :'.data,
                            'danger'
                          )
                    }

                });

            }
          })
    });

    $('body').on('click','.editMahasiswa',function(){
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var id = $(this).data('id');


        $('.edit-nama').val(nama);
        $('.edit-alamat').val(alamat);
        $('#modalEditMahasiswa').modal('show');

        $('.form-edit-mahasiswa').on('submit',function(e){
            e.preventDefault();
            var data = $('.form-edit-mahasiswa').serialize();
            $.ajax({
                data: data,
                type: "POST",
                url: "/mahasiswa/edit/"+id,
                success: function(data){

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Berhasil memperbarui '+nama,

                      });
                      $('.form-tambah-mahasiswa').trigger("reset");
                      $('#modalEditMahasiswa').modal('hide');
                      loadMahasiswa();


                },
                error: function(data){
                    Swal.fire({
                        icon: 'error',
                        position: 'center',
                        title: 'Error!',
                        text: data,
                        showConfirmButton: false,

                    });
                }
            });
        });

    });

});
