<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
     public function index(){

        $data = array(
            'title' => 'Data User',
            'data_user' => User::all(),
        );
         return view('admin.master.user.list', $data);
        // return view('home', $data);
    }

     public function store(Request $request){

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/user')->with('succes','Data Berhasil Disimpan');
    }

     public function update(Request $request, $id){

        User::where('id', $id)->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/user')->with('succes","Data Berhasil Diubah');
    }

     public function destroy($id){

        $user = User::where('id', $id)->delete();
        return redirect('/user')->with('succes','Data Berhasil Dihapus');
    }
}