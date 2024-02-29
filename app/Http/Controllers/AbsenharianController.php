<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rutinitas;
use App\Absenrutinitas;
use Illuminate\Support\Facades\File;

class AbsenharianController extends Controller
{
    public function absenhariantambah($id)
    {
        $rutinitas = Rutinitas::find($id);
        return view('rutinitas.inputabsenharian', ['rutinitas' => $rutinitas]);
    }

    public function absenharianstore($id, Request $request)
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

        Absenrutinitas::create([
            'rutinitas_id' => $request->id,
            'absenrutinitas_tanggal' => $request->tanggal,
            'absenrutinitas_deskripsi' => $request->deskripsi,
            'absenrutinitas_lamajam' => $request->lamajam,
            'absenrutinitas_lamamenit' => $request->lamamenit,
            'absenrutinitas_file' => $nama_file,
        ]);

        $rutinitas = Rutinitas::find($request->id);
        return redirect('/harian/absen/' . $rutinitas->id)->with(['rutinitas' => $rutinitas]);
        // return view('rutinitas.absenharian', ['rutinitas' => $rutinitas]);  
    }

    public function harianabsenedit($id)
    {
        $absenrutinitas = Absenrutinitas::find($id);
        return view('rutinitas.editabsenharian', ['absenrutinitas' => $absenrutinitas]);
    }

    public function harianabsenupdate($id, Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->file == NULL) {
            $absenrutinitas = Absenrutinitas::find($id);
            $absenrutinitas->absenrutinitas_tanggal = $request->tanggal;
            $absenrutinitas->absenrutinitas_deskripsi = $request->deskripsi;
            $absenrutinitas->absenrutinitas_lamajam = $request->lamajam;
            $absenrutinitas->absenrutinitas_lamamenit = $request->lamamenit;
            $absenrutinitas->save();

            $rutinitas = Rutinitas::find($absenrutinitas->rutinitas_id);
            return redirect('/harian/absen/' . $rutinitas->id)->with(['rutinitas' => $rutinitas]);
            
        } elseif ($request->file != NULL) {

            // menghapus file lama
            $gambar = Absenrutinitas::where('id', $id)->first();
            File::delete('data_file/' . $gambar->absenrutinitas_file);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file');
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $nama_file);

            $absenrutinitas = Absenrutinitas::find($id);
            $absenrutinitas->absenrutinitas_tanggal = $request->tanggal;
            $absenrutinitas->absenrutinitas_deskripsi = $request->deskripsi;
            $absenrutinitas->absenrutinitas_lamajam = $request->lamajam;
            $absenrutinitas->absenrutinitas_lamamenit = $request->lamamenit;
            $absenrutinitas->absenrutinitas_file = $nama_file;
            $absenrutinitas->save();

            $rutinitas = Rutinitas::find($absenrutinitas->rutinitas_id);
            return redirect('/harian/absen/' . $rutinitas->id)->with(['rutinitas' => $rutinitas]);
            // return view('rutinitas.absenharian', ['rutinitas' => $rutinitas]);
        }
    }

    public function harianabsenhapus($id)
    {
        // menghapus file lama
        $gambar = Absenrutinitas::where('id', $id)->first();
        File::delete('data_file/' . $gambar->absenrutinitas_file);

        $absenrutinitas = Absenrutinitas::find($id);
        $absenrutinitas->delete();

        $rutinitas = Rutinitas::find($absenrutinitas->rutinitas_id);
        return view('rutinitas.absenharian', ['rutinitas' => $rutinitas]);

        // return redirect()->back();
    }

    public function harianabsendownload($id)
    {
        $data = Absenrutinitas::find($id);
        $filepath = public_path("data_file/{$data->absenrutinitas_file}");
        return response()->download($filepath);
    }
}
