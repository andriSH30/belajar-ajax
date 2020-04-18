@extends('layout/layout')
@section('body')

<br>
<div class="container">
<div class="card">
    <div class="card-header" style="text-align: center;">{{$judul}}</div>
    <div class="card-body">
        <table class="table table-striped table-sm" id="tabel_mahasiswa">
            <thead>
                <tr>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                </tr>
            </thead>

        </table>
    </div>
</div>

</div>
<br><br>

@endsection
