<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){
        $nama = "Rendys Naja Ripando";

        $pelajaran = ["RPPL","WEB","IMK"];

        return view('biodata',['nama' => $nama , 'matkul' => $pelajaran]);
    }
}
