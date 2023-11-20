<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
  public function index(){

        $data = array(
            'title' => 'Data Barang',
            'data_jenis' => JenisBarang::all(),

        );
        return view('admin.master.jenisbarang.list', $data);
}
 public function store(Request $request){

        JenisBarang::create([
            'nama_jenis' => $request->nama_jenis,

        ]);
        return redirect('/jenisbarang')->with('succes','Data Berhasil Disimpan');
    }
}