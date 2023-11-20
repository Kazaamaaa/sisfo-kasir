<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class BarangController extends Controller
{
    public function index(){

        $data = array(
            'title' => 'Data Barang',
            'data_jenis' => JenisBarang::all(),
            'data_barang' => Barang::join('tbl_jenis_barang', 'tbl_jenis_barang.id', '=', 'tbl_barang.id_jenis')
                                ->select('tbl_barang.*', 'tbl_jenis_barang.nama_jenis')
                                ->get(),
        );
        return view('admin.master.barang.list', $data);
}
 public function store(Request $request){

        Barang::create([
            'id_jenis' => $request->id_jenis,
            'nama_barang' => $request->nama_barang,
             'harga' => $request->harga,
              'stok' => $request->stok,
        ]);
        return redirect('/barang')->with('succes','Data Berhasil Disimpan');
    }
}