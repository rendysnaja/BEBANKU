<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MalasngodingController extends Controller
{
    public function input()
    {
        return view('input');
    }
 
    public function proses(Request $request)
    {
        $this->validate($request,[
           'nama' => 'required|min:5|max:20',
           'pekerjaan' => 'required', 
           'usia' => 'required|numeric'
        ]);
 
        // buat proses yang teman-teman inginkan di sini.
        
        return view('proses',['data' => $request]);
    }
}
