@extends('layout/layout')
@section('body')

<br>
<div class="container">
<!-- Button trigger modal -->
<button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#modalTambahMahasiswa">
  Tambah Mahasiswa
</button>
<br><br>
<div class="card">
    <div class="card-header" style="text-align: center;">{{$judul}}</div>
    <div class="card-body">
        <div class="load-mahasiswa"></div>

    </div>
</div>

</div>
<br><br>


<!-- Modal -->
<div class="modal fade" id="modalTambahMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="form-tambah-mahasiswa">
        @csrf
      <div class="modal-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Nama Mahasiswa</label>
                <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <input name="alamat" type="text" class="form-control" id="exampleInputPassword1">
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary tombol-tambahkan">Tambahkan</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal EDIT MAHASISWA -->
<div class="modal fade" id="modalEditMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="form-edit-mahasiswa">
        @csrf
      <div class="modal-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Nama Mahasiswa</label>
                <input name="nama" type="text" class="form-control edit-nama" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <input name="alamat" type="text" class="form-control edit-alamat" id="exampleInputPassword1">
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary tombol-simpan">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection
