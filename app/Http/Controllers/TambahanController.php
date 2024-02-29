<?php

namespace App\Http\Controllers;

use App\Tambahan;
use App\Absentambahan;
use App\Evaluasidetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class TambahanController extends Controller
{
    public function tambahan()
    {
        $evaluasidetail = Evaluasidetail::with(['user.tambahan'])->where('user_id', Auth::user()->id)
            ->where('status', 2)->get();

        return view('tambahan.tabeltambahan', [ 'evaluasidetail' => $evaluasidetail]);
    }

    public function tambahantambah()
    {
        return view('tambahan.inputtambahan');
    }

    public function tambahanstore(Request $request)
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

        Tambahan::create([
            'user_id' => $evaluasidetail->user_id,
            'evaluasidetail_id' => $evaluasidetail->id,
            'tambahan_nama' => $request->nama,
            'tambahan_status' => $request->status,
            'tambahan_pelaksana' => $request->pelaksana,
            'tambahan_lamajam' => $request->lamajam,
            'tambahan_lamamenit' => $request->lamamenit,
            'tambahan_file' => $nama_file,
            'status' => 1,
        ]);

        return redirect('/tambahan');
    }

    public function tambahanedit($id)
    {
        $tambahan = Tambahan::find($id);
        return view('tambahan.edittambahan', ['tambahan' => $tambahan]);
    }

    public function tambahanupdate($id, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'status' => 'required',
            'pelaksana' => 'required',
        ]);

        if ($request->file ==  NULL) {
            $tambahan = Tambahan::find($id);
            $tambahan->tambahan_nama = $request->nama;
            $tambahan->tambahan_status = $request->status;
            $tambahan->tambahan_pelaksana = $request->pelaksana;
            $tambahan->tambahan_lamajam = $request->lamajam;
            $tambahan->tambahan_lamamenit = $request->lamamenit;
            $tambahan->save();

            return redirect('/tambahan');
        }

        elseif ($request->file != NULL){

        // menghapus file lama
        $gambar = Tambahan::where('id', $id)->first();
        File::delete('data_file/' . $gambar->tambahan_file);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        // dd($request->all());

        $tambahan = Tambahan::find($id);
        $tambahan->tambahan_nama = $request->nama;
        $tambahan->tambahan_status = $request->status;
        $tambahan->tambahan_pelaksana = $request->pelaksana;
        $tambahan->tambahan_lamajam = $request->lamajam;
        $tambahan->tambahan_lamamenit = $request->lamamenit;
        $tambahan->tambahan_file = $nama_file;
        $tambahan->save();

        return redirect('/tambahan');
        }
    }

    public function tambahanhapus($id)
    {
        $gambar = Tambahan::where('id', $id)->first();

        if ($gambar->tambahan_id != NULL) {

            // menghapus file lama
            $gambar = Tambahan::where('id', $id)->first();
            File::delete('data_file/' . $gambar->tambahan_file);

            $gambarabsen = Absentambahan::where('tambahan_id', $id)->first();
            File::delete('data_file/' . $gambarabsen->absentambahan_file);

            // $absenrutinitas = Absenrutinitas::find($id);
            $absentambahan = Absentambahan::where('tambahan_id', $id)->first();
            $absentambahan->delete();

            $tambahan = Tambahan::find($id);
            $tambahan->delete();
            return redirect('/tambahan');
        } elseif ($gambar->tambahan_id == NULL) {

            $gambar = Tambahan::where('id', $id)->first();
            File::delete('data_file/' . $gambar->tambahan_file);

            $tambahan = Tambahan::find($id);
            $tambahan->delete();
            return redirect('/tambahan');
        }

        // menghapus file lama
        // $gambar = Tambahan::where('id', $id)->first();
        // File::delete('data_file/' . $gambar->tambahan_file);

        // $gambarabsen = Absentambahan::where('tambahan_id', $id)->first();
        // File::delete('data_file/' . $gambarabsen->absentambahan_file);

        // $absenrutinitas = Absenrutinitas::find($id);
        // $absentambahan = Absentambahan::where('tambahan_id', $id)->first();
        // $absentambahan->delete();

        // $tambahan = Tambahan::find($id);
        // $tambahan->delete();
        // return redirect('/tambahan');
    }

    public function tambahanabsen($id)
    {
        $tambahan = Tambahan::find($id);
        return view('tambahan.absentambahan', ['tambahan' => $tambahan]);
    }

    public function tambahandownload($id)
    {
        $data = Tambahan::find($id);
        $filepath = public_path("data_file/{$data->tambahan_file}");
        return response()->download($filepath);
    }
}
