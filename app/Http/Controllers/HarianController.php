<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Rutinitas;
use App\Absenrutinitas;
use App\Evaluasi;
use App\Evaluasidetail;
use PDF;

class HarianController extends Controller
{
    public function index()
    {
        $rutinitas = Rutinitas::all();
        return view('harian', ['rutinitas' => $rutinitas]);
    }

    public function harian()
    {
        $evaluasidetail = Evaluasidetail::with(['user.rutinitas'])->where('user_id', Auth::user()->id)
        ->where('status', 2)->get();

        return view('rutinitas.tabelharian', ['evaluasidetail' => $evaluasidetail]);
    }

    public function hariantambah()
    {
        return view('rutinitas.inputharian');
    }

    public function harianstore(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'status' => 'required',
            'pelaksana' => 'required',
            'file' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        $evaluasidetail = Evaluasidetail::where('user_id', Auth::id())
            ->where('status', '=', 2)->first();

        Rutinitas::create([
            'user_id' => $evaluasidetail->user_id,
            'evaluasidetail_id' => $evaluasidetail->id,
            'rutinitas_nama' => $request->nama,
            'rutinitas_status' => $request->status,
            'rutinitas_pelaksana' => $request->pelaksana,
            'rutinitas_lamajam' => $request->lamajam,
            'rutinitas_lamamenit' => $request->lamamenit,
            'rutinitas_file' => $nama_file,
            'status' => 1,
        ]);


        return redirect('/harian');
    }

    public function harianedit($id)
    {
        $rutinitas = Rutinitas::find($id);
        return view('rutinitas.editharian', ['rutinitas' => $rutinitas]);
    }

    public function harianupdate($id, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'status' => 'required',
            'pelaksana' => 'required',
        ]);

        if ($request->file ==  NULL) {
            $rutinitas = Rutinitas::find($id);
            $rutinitas->rutinitas_nama = $request->nama;
            $rutinitas->rutinitas_status = $request->status;
            $rutinitas->rutinitas_pelaksana = $request->pelaksana;
            $rutinitas->rutinitas_lamajam = $request->lamajam;
            $rutinitas->rutinitas_lamamenit = $request->lamamenit;
            $rutinitas->save();

            return redirect('/harian');
        }

        elseif ($request->file !=  NULL){

        // menghapus file lama
        $gambar = Rutinitas::where('id', $id)->first();
        File::delete('data_file/' . $gambar->rutinitas_file);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        $rutinitas = Rutinitas::find($id);
        $rutinitas->rutinitas_nama = $request->nama;
        $rutinitas->rutinitas_status = $request->status;
        $rutinitas->rutinitas_pelaksana = $request->pelaksana;
        $rutinitas->rutinitas_lamajam = $request->lamajam;
        $rutinitas->rutinitas_lamamenit = $request->lamamenit;
        $rutinitas->rutinitas_file = $nama_file;
        $rutinitas->save();

        return redirect('/harian');
        }
    }

    public function harianhapus($id)
    {
        $gambar = Rutinitas::where('id', $id)->first();

        if ($gambar->rutinitas_id != NULL) {

            // menghapus file lama
            $gambar = Rutinitas::where('id', $id)->first();
            File::delete('data_file/' . $gambar->rutinitas_file);

            $gambarabsen = Absenrutinitas::where('rutinitas_id', $id)->first();
            File::delete('data_file/' . $gambarabsen->absenrutinitas_file);

            $absenrutinitas = Absenrutinitas::where('rutinitas_id', $id)->first();
            $absenrutinitas->delete();

            $rutinitas = Rutinitas::find($id);
            $rutinitas->delete();
            return redirect('/harian');
        } elseif ($gambar->rutinitas_id == NULL) {

            $gambar = Rutinitas::where('id', $id)->first();
            File::delete('data_file/' . $gambar->rutinitas_file);

            $rutinitas = Rutinitas::find($id);
            $rutinitas->delete();
            return redirect('/harian');
        }

        // menghapus file lama
        // $gambar = Rutinitas::where('id', $id)->first();
        // File::delete('data_file/' . $gambar->rutinitas_file);

        // $gambarabsen = Absenrutinitas::where('rutinitas_id', $id)->first();
        // File::delete('data_file/' . $gambarabsen->absenrutinitas_file);

        // $absenrutinitas = Absenrutinitas::find($id);
        // $absenrutinitas = Absenrutinitas::where('rutinitas_id', $id)->first();
        // $absenrutinitas->delete();

        // $rutinitas = Rutinitas::find($id);
        // $rutinitas->delete();
        // return redirect('/harian');
    }

    public function harianabsen($id)
    {
        $rutinitas = Rutinitas::find($id);
        return view('rutinitas.absenharian', ['rutinitas' => $rutinitas]);
    }

    public function hariandownload($id)
    {
        $data = Rutinitas::find($id);
        $filepath = public_path("data_file/{$data->rutinitas_file}");
        return response()->download($filepath);
    }

    public function hapusfile($id)
    {
        // hapus file
        $gambar = Rutinitas::where('id', $id)->first();
        File::delete('data_file/' . $gambar->rutinitas_file);

        // hapus data

        $data = Rutinitas::find($id);
        $namafile = $data->rutinitas_file;
        $namafile->delete();
        return redirect()->back();
    }
}
