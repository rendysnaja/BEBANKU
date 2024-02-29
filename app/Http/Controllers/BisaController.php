<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BisaController extends Controller
{
    public function tambah()
    {
        
        // memanggil view tambah
        return view('blog');
    
     }

     public function tambahin()
    {
        
        // memanggil view tambah
        return view('kontak');
    
     }

    public function store(Request $request){

        // insert data ke table pegawai
        DB::table('pegawai')->insert([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat
        ]);

        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
        
    }
}
