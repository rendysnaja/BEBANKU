<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tambahan;
use App\Absentambahan;
use Illuminate\Support\Facades\File;

class AbsentambahanController extends Controller
{
    public function absentambahantambah($id)
    {
        $tambahan = Tambahan::find($id);
        return view('tambahan.inputabsentambahan', ['tambahan' => $tambahan]);
    }

    public function absentambahanstore($id, Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'file' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        Absentambahan::create([
            'tambahan_id' => $request->id,
            'absentambahan_tanggal' => $request->tanggal,
            'absentambahan_deskripsi' => $request->deskripsi,
            'absentambahan_lamajam' => $request->lamajam,
            'absentambahan_lamamenit' => $request->lamamenit,
            'absentambahan_file' => $nama_file,
        ]);

        $tambahan = Tambahan::find($request->id);
        return redirect('/tambahan/absen/'.$tambahan->id)->with(['tambahan'=>$tambahan]);
        // return view('rutinitas.absenharian', ['rutinitas' => $rutinitas]);  
    }

    public function tambahanabsenedit($id)
    {
        $absentambahan = Absentambahan::find($id);
        return view('tambahan.editabsentambahan', ['absentambahan' => $absentambahan]);
    }

    public function tambahanabsenupdate($id, Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'file' => 'file',
        ]);

        if ($request->file ==  NULL) {
            $absentambahan = Absentambahan::find($id);
            $absentambahan->absentambahan_tanggal = $request->tanggal;
            $absentambahan->absentambahan_deskripsi = $request->deskripsi;
            $absentambahan->absentambahan_lamajam = $request->lamajam;
            $absentambahan->absentambahan_lamamenit = $request->lamamenit;
            $absentambahan->save();

            $tambahan = Tambahan::find($absentambahan->tambahan_id);
            return redirect('/tambahan/absen/'.$tambahan->id)->with(['rutinitas'=>$tambahan]);
        }

        elseif ($request->file != NULL){

        // menghapus file lama
        $gambar = Absentambahan::where('id', $id)->first();
        File::delete('data_file/' . $gambar->absentambahan_file);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        $absentambahan = Absentambahan::find($id);
        $absentambahan->absentambahan_tanggal = $request->tanggal;
        $absentambahan->absentambahan_deskripsi = $request->deskripsi;
        $absentambahan->absentambahan_lamajam = $request->lamajam;
        $absentambahan->absentambahan_lamamenit = $request->lamamenit;
        $absentambahan->absentambahan_file = $nama_file;
        $absentambahan->save();

        $tambahan = Tambahan::find($absentambahan->tambahan_id);
        return redirect('/tambahan/absen/'.$tambahan->id)->with(['rutinitas'=>$tambahan]);
        // return view('rutinitas.absenharian', ['rutinitas' => $rutinitas]);
        }
    }

    public function tambahanabsenhapus($id)
    {
        $gambarabsen = Absentambahan::where('tambahan_id',$id)->first();
        File::delete('data_file/'.$gambarabsen->absentambahan_file);
        
        $absentambahan = Absentambahan::find($id);
        $absentambahan->delete();

        $tambahan = Tambahan::find($absentambahan->tambahan_id);
        return redirect('/harian/absen/'.$tambahan->id)->with(['tambahan'=>$tambahan]);
        // return view('tambahan.absentambahan', ['tambahan' => $tambahan]);

        // return redirect()->back();
    }

    public function tambahanabsendownload($id)
    {
        $data = Absentambahan::find($id);
        $filepath = public_path("data_file/{$data->absentambahan_file}");
        return response()->download($filepath);
    }
}
