<?php

namespace App\Http\Controllers;

use App\Izin;
use App\Evaluasidetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    public function tabelizin()
    {
        $evaluasidetail = Evaluasidetail::with(['user.izin'])->where('user_id', Auth::user()->id)
            ->where('status', 2)->get();

        $izin = Izin::all();
        return view('izin.tabelizin', ['evaluasidetail' => $evaluasidetail]);
    }

    public function tambahizin()
    {
        return view('izin.tambahizin');
    }

    public function izinstore(Request $request)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
            'jenis' => 'required',
            'tanggal' => 'required',
            'lama' => 'required',
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

        Izin::create([
            'user_id'=>$evaluasidetail->user_id,
            'evaluasidetail_id'=>$evaluasidetail->id,
            'izin_deskripsi' => $request->deskripsi,
            'izin_jenis' => $request->jenis,
            'izin_tanggal' => $request->tanggal,
            'izin_lamahari' => $request->lama,
            'izin_file' => $nama_file,
        ]);

        return redirect('/tabelizin');
    }

    public function editizin($id)
    {
        $izin = Izin::find($id);
        return view('izin.editizin', ['izin' => $izin]);
    }

    public function izinupdate($id, Request $request)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
            'jenis' => 'required',
            'tanggal' => 'required',
            'lama' => 'required',
        ]);

        // dd($request->all());

        if ($request->file ==  NULL) {
            $izin = Izin::find($id);
            $izin->izin_deskripsi = $request->deskripsi;
            $izin->izin_jenis = $request->jenis;
            $izin->izin_tanggal = $request->tanggal;
            $izin->izin_lamahari = $request->lama;
            $izin->save();

            return redirect('/tabelizin');
        }

        elseif ($request->file != NULL){

            $gambar = Izin::where('id', $id)->first();
            File::delete('data_file/' . $gambar->izin_file);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file');
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $nama_file);

            $izin = Izin::find($id);
            $izin->izin_deskripsi = $request->deskripsi;
            $izin->izin_jenis = $request->jenis;
            $izin->izin_tanggal = $request->tanggal;
            $izin->izin_lamahari = $request->lama;
            $izin->izin_file = $nama_file;
            $izin->save();

            return redirect('/tabelizin');
        }
    }

    public function izinhapus($id)
    {
        $gambar = Izin::where('id', $id)->first();
        File::delete('data_file/' . $gambar->izin_file);

        $izin = Izin::find($id);
        $izin->delete();
        return redirect('/tabelizin');
    }

    public function izindownload($id)
    {
        $data = Izin::find($id);
        $filepath = public_path("data_file/{$data->izin_file}");
        return response()->download($filepath);
    }
}
