<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;
use DataTables;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $judul = "DATA MAHASISWA UNIVERSITAS X";
        return view('welcome',compact('judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            $mahasiswa = new mahasiswa;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->Save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = mahasiswa::find($id);
        $data->delete();
    }

    public function tabel(){
        return view('tabelMahasiswa');
    }

    public function getDataMahasiswa(){
        return Datatables::of(mahasiswa::all())->addIndexColumn()
        ->addColumn('aksi', function($row){
               $btn = '<a href="javascript:void(0)" data-toggle="modal" data-target="#modalEditMahasiswa"  data-id="'.$row->id.'" data-nama="'.$row->nama.'" data-alamat="'.$row->alamat.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editMahasiswa">Edit</a>';
               $btn = $btn.' <a href="javascript:void(0)"  data-id="'.$row->id.'" data-nama="'.$row->nama.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteMahasiswa">Delete</a>';
                return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

}
