<?php

namespace App\Http\Controllers;

use App\Evaluasidetail;
use App\User;
use App\Asesor;
use App\Rutinitas;
use App\Tambahan;
use App\Absenrutinitas;
use App\Absentambahan;
use App\Fterutinitas;
use App\Ftetambahan;
use App\Izin;
use App\Hasilevaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class VerifikasiController extends Controller
{
    public function verifikasipeserta()
    {
 
        $asesor = Asesor::where('user_id', Auth::id())->first();

    	return view('verifikasi.daftarpeserta', ['asesor' => $asesor]);
 
    }

    public function verifikasi($id)
    {
 
        $evaluasidetail = Evaluasidetail::where('id', $id)->first();
        $kurang = "Kurang";
        $normal = "Normal";
        $berlebihan = "Berlebihan";

        //Kegiatan diterima
        $diterima = "Diterima";

        $rutinitasditerima1 = Fterutinitas::where('evaluasidetail_id', $id)->where('asesorrutinitas_status', $diterima)->get();
        // $rutinitasditerima = Fterutinitas::where('evaluasidetail_id', $id)
        // ->where('asesorrutinitas_status', $diterima)
        // ->get();
        $rutinitasditerima = $rutinitasditerima1->count();

        $tambahanditerima1 = Ftetambahan::where('evaluasidetail_id', $id)->where('asesortambahan_status', $diterima)->get();
        $tambahanditerima = $tambahanditerima1->count();

        //Kegiatan ditolak
        $ditolak = "Ditolak";

        $rutinitasditolak1 = Fterutinitas::where('evaluasidetail_id', $id)->where('asesorrutinitas_status', $ditolak)->get();
        $rutinitasditolak = $rutinitasditolak1->count();

        $tambahanditolak1 = Ftetambahan::where('evaluasidetail_id', $id)->where('asesortambahan_status', $ditolak)->get();
        $tambahanditolak = $tambahanditolak1->count();

        //Total kegiatan
        $totalkegiatan = $evaluasidetail->rutinitas->count() + $evaluasidetail->tambahan->count();
        $totalditerima = $rutinitasditerima + $tambahanditerima;
        $totalditolak = $rutinitasditolak + $tambahanditolak;

        //Jumlah Kategori Kegiatan FTE Rutinitas
        $fterutinitaskurang1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('fterutinitas_kategori', $kurang)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $fterutinitaskurang = $fterutinitaskurang1->count();

        $fterutinitasnormal1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('fterutinitas_kategori', $normal)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $fterutinitasnormal = $fterutinitasnormal1->count();

        $fterutinitasberlebihan1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('fterutinitas_kategori', $berlebihan)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $fterutinitasberlebihan = $fterutinitasberlebihan1->count();

        //Jumlah Kategori Kegiatan FTE Tambahan
        $ftetambahankurang1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('ftetambahan_kategori', $kurang)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $ftetambahankurang = $ftetambahankurang1->count();

        $ftetambahannormal1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('ftetambahan_kategori', $normal)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $ftetambahannormal = $ftetambahannormal1->count();

        $ftetambahanberlebihan1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('ftetambahan_kategori', $berlebihan)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $ftetambahanberlebihan = $ftetambahanberlebihan1->count();

        //Total Kategori Kegiatan FTE
        $fteberlebihan = $fterutinitasberlebihan + $ftetambahanberlebihan;
        $ftenormal = $fterutinitasnormal + $ftetambahannormal;
        $ftekurang = $fterutinitaskurang + $ftetambahankurang;

        //Total Nilai Beban FTE
        $fterutinitasnilai = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('asesorrutinitas_status', $diterima)
        ->get();

        $ftetambahannilai = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('asesortambahan_status', $diterima)
        ->get();

        $sumfterutinitas = $fterutinitasnilai->sum('fterutinitas_nilai');
        $sumftetambahan = $ftetambahannilai->sum('ftetambahan_nilai');
        $sumftetotal = $sumfterutinitas + $sumftetambahan;

        //Jumlah Kategori Kegiatan Rutinitas Asesor
        $asesorrutinitaskurang1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('asesorrutinitas_kategori', $kurang)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $asesorrutinitaskurang = $asesorrutinitaskurang1->count();

        $asesorrutinitasnormal1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('asesorrutinitas_kategori', $normal)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $asesorrutinitasnormal = $asesorrutinitasnormal1->count();

        $asesorrutinitasberlebihan1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('asesorrutinitas_kategori', $berlebihan)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $asesorrutinitasberlebihan = $asesorrutinitasberlebihan1->count();

        //Jumlah Kategori Kegiatan Tambahan Asesor
        $asesortambahankurang1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('asesortambahan_kategori', $kurang)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $asesortambahankurang = $asesortambahankurang1->count();

        $asesortambahannormal1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('asesortambahan_kategori', $normal)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $asesortambahannormal = $asesortambahannormal1->count();

        $asesortambahanberlebihan1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('asesortambahan_kategori', $berlebihan)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $asesortambahanberlebihan = $asesortambahanberlebihan1->count();

        //Total Kategori Kegiatan Asesor
        $asesorberlebihan = $asesorrutinitasberlebihan + $asesortambahanberlebihan;
        $asesornormal = $asesorrutinitasnormal + $asesortambahannormal;
        $asesorkurang = $asesorrutinitaskurang + $asesortambahankurang;

        //Total Nilai Beban Asesor
        $asesorrutinitasnilai = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('asesorrutinitas_status', $diterima)
        ->get();

        $asesortambahannilai = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('asesortambahan_status', $diterima)
        ->get();

        $sumasesorrutinitas = $asesorrutinitasnilai->sum('asesorrutinitas_nilai');
        $sumasesortambahan = $asesortambahannilai->sum('asesortambahan_nilai');
        $sumasesortotal = $sumasesorrutinitas + $sumasesortambahan;

    	return view('verifikasi.verifikasi', [
            'evaluasidetail' => $evaluasidetail,
            'totalkegiatan' => $totalkegiatan,
            'rutinitasditerima' => $rutinitasditerima,
            'tambahanditerima' => $tambahanditerima,
            'rutinitasditolak' => $rutinitasditolak,
            'tambahanditolak' => $tambahanditolak,         
            'totalditerima' => $totalditerima,
            'totalditolak' => $totalditolak,
            'fterutinitaskurang' => $fterutinitaskurang,
            'fterutinitasnormal' => $fterutinitasnormal,
            'fterutinitasberlebihan' => $fterutinitasberlebihan,
            'ftetambahankurang' => $ftetambahankurang,
            'ftetambahannormal' => $ftetambahannormal,
            'ftetambahanberlebihan' => $ftetambahanberlebihan,
            'fteberlebihan'=> $fteberlebihan,
            'ftenormal' => $ftenormal,
            'ftekurang' => $ftekurang,
            'sumfterutinitas' => $sumfterutinitas,
            'sumftetambahan' => $sumftetambahan,
            'sumftetotal' => $sumftetotal,
            'asesorrutinitaskurang' => $asesorrutinitaskurang,
            'asesorrutinitasnormal' => $asesorrutinitasnormal,
            'asesorrutinitasberlebihan' => $asesorrutinitasberlebihan,
            'asesortambahankurang' => $asesortambahankurang,
            'asesortambahannormal' => $asesortambahannormal,
            'asesortambahanberlebihan' => $asesortambahanberlebihan,
            'asesorberlebihan'=> $asesorberlebihan,
            'asesornormal' => $asesornormal,
            'asesorkurang' => $asesorkurang,
            'sumasesorrutinitas' => $sumasesorrutinitas,
            'sumasesortambahan' => $sumasesortambahan,
            'sumasesortotal' => $sumasesortotal,
        ]);
 
    }

	public function verifikasikegiatan($id)
    {
        $rutinitas = Rutinitas::where('id', $id)->first();
        $absenrutinitas = Absenrutinitas::where('rutinitas_id', $id)->get();
        $user_id = $rutinitas->user_id;
        $evaluasidetail_id = $rutinitas->evaluasidetail_id;
        $izin = Izin::where('evaluasidetail_id', $evaluasidetail_id)->where('user_id', $user_id)->get();
        $evaluasidetail = Evaluasidetail::where('id', $evaluasidetail_id)->first();

        //Total waktu kegiatan
        $sumjam = $absenrutinitas->sum('absenrutinitas_lamajam');
        $summenit = $absenrutinitas->sum('absenrutinitas_lamamenit');

        $jamconvert = $sumjam * 60;
        $totalwaktu = $jamconvert + $summenit;

        //Total waktu bekerja 1 tahun
        $waktubekerja2 = $evaluasidetail->evaluasi->tahun->tahun_jumlahhari;
        $waktubekerja1 = $waktubekerja2 * 8;
        $waktubekerja = $waktubekerja1 * 60;

        // $waktubekerja = 117600;

        //Izin
        $izin1 = $izin->sum('izin_lamahari');
        $izin2 = $izin1 * 8;
        $izin3 = $izin2 * 60;

        //Total 1 tahun kerja - izin
        $waktusetahun = $waktubekerja - $izin3;

        //Allowance
        $allowanceasli = $evaluasidetail->evaluasi->tahun->tahun_kelonggaran;
        $allowance = $totalwaktu / 100;
        $allowance1 = $allowance * $allowanceasli;

        //FTE
        $waktu = $totalwaktu + $allowance1;
        $waktu1 = $waktu / $waktusetahun;
        $waktu2 = $waktu1 / $rutinitas->rutinitas_pelaksana;

    	return view('verifikasi.verifikasikegiatan', [
            'rutinitas' => $rutinitas, 
            'waktu2' => $waktu2,
            'sumjam' => $sumjam, 
            'waktu1' => $waktu,
        ]);
 
    }

    public function verifikasistore($id, Request $request)
    {
        $rutinitas = Rutinitas::where('id', $id)->first();
        $absenrutinitas = Absenrutinitas::where('rutinitas_id', $id)->get();
        $user_id = $rutinitas->user_id;
        $evaluasidetail_id = $rutinitas->evaluasidetail_id;
        $izin = Izin::where('evaluasidetail_id', $evaluasidetail_id)->where('user_id', $user_id)->get();
        $evaluasidetail = Evaluasidetail::where('id', $evaluasidetail_id)->first();

        //Total waktu kegiatan
        $sumjam = $absenrutinitas->sum('absenrutinitas_lamajam');
        $summenit = $absenrutinitas->sum('absenrutinitas_lamamenit');

        $jamconvert = $sumjam * 60;
        $totalwaktu = $jamconvert + $summenit;

        //Total waktu bekerja 1 tahun
        $waktubekerja2 = $evaluasidetail->evaluasi->tahun->tahun_jumlahhari;
        $waktubekerja1 = $waktubekerja2 * 8;
        $waktubekerja = $waktubekerja1 * 60;

        //Izin
        $izin1 = $izin->sum('izin_lamahari');
        $izin2 = $izin1 * 8;
        $izin3 = $izin2 * 60;

        //Total 1 tahun kerja - izin
        $waktusetahun = $waktubekerja - $izin3;

        //Allowance
        $allowanceasli = $evaluasidetail->evaluasi->tahun->tahun_kelonggaran;
        $allowance = $totalwaktu / 100;
        $allowance1 = $allowance * $allowanceasli;

        //FTE
        $waktu = $totalwaktu + $allowance1;
        $waktu1 = $waktu / $waktusetahun;
        $waktunumbering = $waktu1 / $rutinitas->rutinitas_pelaksana;
        $waktu2 = number_format($waktunumbering, 2);

        if($waktu2 < 0.99){
            $kategorifte = "Kurang";
        }
        elseif($waktu2 >= 0.99 || $waktu2 <=1.28) {
            $kategorifte = "Normal";
        }
        elseif($waktu2 > 1.28) {
            $kategorifte = "Berlebihan";
        }
        
        $request->validate([
            'nilaiasesor' => 'required',
            'kategoriasesor' => 'required',
            'komentar' => 'required',
            'status' => 'required',
        ]);

        $rutinitas = Rutinitas::find($id);

        Fterutinitas::create([
            'rutinitas_id' => $id,
            'evaluasidetail_id' => $rutinitas->evaluasidetail_id,
            'fterutinitas_nilai' => $waktu2,
            'fterutinitas_kategori' => $kategorifte,
            'asesorrutinitas_nilai' => $request->nilaiasesor,
            'asesorrutinitas_kategori' => $request->kategoriasesor,
            'asesorrutinitas_komentar' => $request->komentar,
            'asesorrutinitas_status' => $request->status,
        ]);

        $rutinitas = Rutinitas::find($id);
        $rutinitas->status = 2;
        $rutinitas->save();

        $evaluasidetail = Evaluasidetail::find($rutinitas->evaluasidetail_id);
        return redirect('/verifikasi/' . $evaluasidetail->id)->with(['evaluasidetail' => $evaluasidetail]);
    }

    public function verifikasikegiatanedit($id)
    {
        $rutinitas = Rutinitas::where('id', $id)->first();

        return view('verifikasi.verifikasiedit', ['rutinitas' => $rutinitas]);
    }

    public function verifikasikegiatanupdate($id, Request $request)
    {
        $request->validate([
            'nilaiasesor' => 'required',
            'kategoriasesor' => 'required',
            'komentar' => 'required',
            'status' => 'required',
        ]);

        $fterutinitas = Fterutinitas::find($id);
        $fterutinitas->asesorrutinitas_nilai = $request->nilaiasesor;
        $fterutinitas->asesorrutinitas_kategori = $request->kategoriasesor;
        $fterutinitas->asesorrutinitas_komentar = $request->komentar;
        $fterutinitas->asesorrutinitas_status = $request->status;
        $fterutinitas->save();

        $evaluasidetail = Evaluasidetail::find($fterutinitas->evaluasidetail_id);
        return redirect('/verifikasi/' . $evaluasidetail->id)->with(['evaluasidetail' => $evaluasidetail]);
    }

    public function verifikasikegiatan2($id)
    {
        $tambahan = Tambahan::where('id', $id)->first();
        $absentambahan = Absentambahan::where('tambahan_id', $id)->get();
        $user_id = $tambahan->user_id;
        $evaluasidetail_id = $tambahan->evaluasidetail_id;
        $izin = Izin::where('evaluasidetail_id', $evaluasidetail_id)->where('user_id', $user_id)->get();
        $evaluasidetail = Evaluasidetail::where('id', $evaluasidetail_id)->first();

        //Total waktu kegiatan
        $sumjam = $absentambahan->sum('absentambahan_lamajam');
        $summenit = $absentambahan->sum('absentambahan_lamamenit');

        $jamconvert = $sumjam * 60;
        $totalwaktu = $jamconvert + $summenit;

        //Total waktu bekerja 1 tahun
        $waktubekerja2 = $evaluasidetail->evaluasi->tahun->tahun_jumlahhari;
        $waktubekerja1 = $waktubekerja2 * 8;
        $waktubekerja = $waktubekerja1 * 60;

        //Izin
        $izin1 = $izin->sum('izin_lamahari');
        $izin2 = $izin1 * 8;
        $izin3 = $izin2 * 60;

        //Total 1 tahun kerja - izin
        $waktusetahun = $waktubekerja - $izin3;

        //Allowance
        $allowanceasli = $evaluasidetail->evaluasi->tahun->tahun_kelonggaran;
        $allowance = $totalwaktu / 100;
        $allowance1 = $allowance * $allowanceasli;

        //FTE
        $waktu = $totalwaktu + $allowance1;
        $waktu1 = $waktu / $waktusetahun;
        $waktu2 = $waktu1 / $tambahan->tambahan_pelaksana;

    	return view('verifikasi.verifikasikegiatan2', [
            'tambahan' => $tambahan, 
            'waktu2' => $waktu2,
            'sumjam' => $sumjam, 
            'waktu1' => $waktu
        ]);
 
    }

    public function verifikasistore2($id, Request $request)
    {
        $tambahan = Tambahan::where('id', $id)->first();
        $absentambahan = Absentambahan::where('tambahan_id', $id)->get();
        $user_id = $tambahan->user_id;
        $evaluasidetail_id = $tambahan->evaluasidetail_id;
        $izin = Izin::where('evaluasidetail_id', $evaluasidetail_id)->where('user_id', $user_id)->get();
        $evaluasidetail = Evaluasidetail::where('id', $evaluasidetail_id)->first();

        //Total waktu kegiatan
        $sumjam = $absentambahan->sum('absentambahan_lamajam');
        $summenit = $absentambahan->sum('absentambahan_lamamenit');

        $jamconvert = $sumjam * 60;
        $totalwaktu = $jamconvert + $summenit;

        //Total waktu bekerja 1 tahun
        $waktubekerja2 = $evaluasidetail->evaluasi->tahun->tahun_jumlahhari;
        $waktubekerja1 = $waktubekerja2 * 24;
        $waktubekerja = $waktubekerja1 * 60;

        //Izin
        $izin1 = $izin->sum('izin_lamahari');
        $izin2 = $izin1 * 8;
        $izin3 = $izin2 * 60;

        //Total 1 tahun kerja - izin
        $waktusetahun = $waktubekerja - $izin3;

        //Allowance
        $allowanceasli = $evaluasidetail->evaluasi->tahun->tahun_kelonggaran;
        $allowance = $totalwaktu / 100;
        $allowance1 = $allowance * $allowanceasli;

        //FTE
        $waktu = $totalwaktu + $allowance1;
        $waktu1 = $waktu / $waktusetahun;
        $waktunumbering = $waktu1 / $tambahan->tambahan_pelaksana;
        $waktu2 = number_format($waktunumbering,2);

        if($waktu2 < 0.99){
            $kategorifte = "Kurang";
        }
        elseif($waktu2 >= 0.99 || $waktu2 <=1.28) {
            $kategorifte = "Normal";
        }
        elseif($waktu2 > 1.28) {
            $kategorifte = "Berlebihan";
        }
        
        $request->validate([
            'nilaiasesor' => 'required',
            'kategoriasesor' => 'required',
            'komentar' => 'required',
            'status' => 'required',
        ]);

        $tambahan = Tambahan::find($id);

        Ftetambahan::create([
            'tambahan_id' => $id,
            'evaluasidetail_id' => $tambahan->evaluasidetail_id,
            'ftetambahan_nilai' => $waktu2,
            'ftetambahan_kategori' => $kategorifte,
            'asesortambahan_nilai' => $request->nilaiasesor,
            'asesortambahan_kategori' => $request->kategoriasesor,
            'asesortambahan_komentar' => $request->komentar,
            'asesortambahan_status' => $request->status,
        ]);

        $tambahan = Tambahan::find($id);
        $tambahan->status = 2;
        $tambahan->save();

        $evaluasidetail = Evaluasidetail::find($tambahan->evaluasidetail_id);
        return redirect('/verifikasi/' . $evaluasidetail->id)->with(['evaluasidetail' => $evaluasidetail]);
    }

    public function verifikasikegiatanedit2($id)
    {
        $tambahan = Tambahan::where('id', $id)->first();

        return view('verifikasi.verifikasiedit2', ['tambahan' => $tambahan]);
    }

    public function verifikasikegiatanupdate2($id, Request $request)
    {
        $request->validate([
            'nilaiasesor' => 'required',
            'kategoriasesor' => 'required',
            'komentar' => 'required',
            'status' => 'required',
        ]);

        $ftetambahan = Ftetambahan::find($id);
        $ftetambahan->asesortambahan_nilai = $request->nilaiasesor;
        $ftetambahan->asesortambahan_kategori = $request->kategoriasesor;
        $ftetambahan->asesortambahan_komentar = $request->komentar;
        $ftetambahan->asesortambahan_status = $request->status;
        $ftetambahan->save();

        $evaluasidetail = Evaluasidetail::find($ftetambahan->evaluasidetail_id);
        return redirect('/verifikasi/' . $evaluasidetail->id)->with(['evaluasidetail' => $evaluasidetail]);
    }

    public function verifikasiselesai($id)
    {
 
        $evaluasidetail = Evaluasidetail::where('id', $id)->first();
        $kurang = "Kurang";
        $normal = "Normal";
        $berlebihan = "Berlebihan";

        //Kegiatan diterima
        $diterima = "Diterima";

        $rutinitasditerima1 = Fterutinitas::where('evaluasidetail_id', $id)->where('asesorrutinitas_status', $diterima)->get();
        $rutinitasditerima = $rutinitasditerima1->count();

        $tambahanditerima1 = Ftetambahan::where('evaluasidetail_id', $id)->where('asesortambahan_status', $diterima)->get();
        $tambahanditerima = $tambahanditerima1->count();

        //Kegiatan ditolak
        $ditolak = "Ditolak";

        $rutinitasditolak1 = Fterutinitas::where('evaluasidetail_id', $id)->where('asesorrutinitas_status', $ditolak)->get();
        $rutinitasditolak = $rutinitasditolak1->count();

        $tambahanditolak1 = Ftetambahan::where('evaluasidetail_id', $id)->where('asesortambahan_status', $ditolak)->get();
        $tambahanditolak = $tambahanditolak1->count();

        //Total kegiatan
        $totalkegiatan = $evaluasidetail->rutinitas->count() + $evaluasidetail->tambahan->count();
        $totalditerima = $rutinitasditerima + $tambahanditerima;
        $totalditolak = $rutinitasditolak + $tambahanditolak;

        //Jumlah Kategori Kegiatan FTE Rutinitas
        $fterutinitaskurang1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('fterutinitas_kategori', $kurang)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $fterutinitaskurang = $fterutinitaskurang1->count();

        $fterutinitasnormal1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('fterutinitas_kategori', $normal)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $fterutinitasnormal = $fterutinitasnormal1->count();

        $fterutinitasberlebihan1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('fterutinitas_kategori', $berlebihan)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $fterutinitasberlebihan = $fterutinitasberlebihan1->count();

        //Jumlah Kategori Kegiatan FTE Tambahan
        $ftetambahankurang1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('ftetambahan_kategori', $kurang)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $ftetambahankurang = $ftetambahankurang1->count();

        $ftetambahannormal1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('ftetambahan_kategori', $normal)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $ftetambahannormal = $ftetambahannormal1->count();

        $ftetambahanberlebihan1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('ftetambahan_kategori', $berlebihan)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $ftetambahanberlebihan = $ftetambahanberlebihan1->count();

        //Total Kategori Kegiatan FTE
        $fteberlebihan = $fterutinitasberlebihan + $ftetambahanberlebihan;
        $ftenormal = $fterutinitasnormal + $ftetambahannormal;
        $ftekurang = $fterutinitaskurang + $ftetambahankurang;

        //Total Nilai Beban FTE
        $fterutinitasnilai = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('asesorrutinitas_status', $diterima)
        ->get();

        $ftetambahannilai = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('asesortambahan_status', $diterima)
        ->get();

        $sumfterutinitas = $fterutinitasnilai->sum('fterutinitas_nilai');
        $sumftetambahan = $ftetambahannilai->sum('ftetambahan_nilai');
        $sumftetotal = $sumfterutinitas + $sumftetambahan;

        //Jumlah Kategori Kegiatan Rutinitas Asesor
        $asesorrutinitaskurang1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('asesorrutinitas_kategori', $kurang)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $asesorrutinitaskurang = $asesorrutinitaskurang1->count();

        $asesorrutinitasnormal1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('asesorrutinitas_kategori', $normal)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $asesorrutinitasnormal = $asesorrutinitasnormal1->count();

        $asesorrutinitasberlebihan1 = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('asesorrutinitas_kategori', $berlebihan)
        ->where('asesorrutinitas_status', $diterima)
        ->get();
        $asesorrutinitasberlebihan = $asesorrutinitasberlebihan1->count();

        //Jumlah Kategori Kegiatan Tambahan Asesor
        $asesortambahankurang1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('asesortambahan_kategori', $kurang)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $asesortambahankurang = $asesortambahankurang1->count();

        $asesortambahannormal1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('asesortambahan_kategori', $normal)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $asesortambahannormal = $asesortambahannormal1->count();

        $asesortambahanberlebihan1 = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('asesortambahan_kategori', $berlebihan)
        ->where('asesortambahan_status', $diterima)
        ->get();
        $asesortambahanberlebihan = $asesortambahanberlebihan1->count();

        //Total Kategori Kegiatan Asesor
        $asesorberlebihan = $asesorrutinitasberlebihan + $asesortambahanberlebihan;
        $asesornormal = $asesorrutinitasnormal + $asesortambahannormal;
        $asesorkurang = $asesorrutinitaskurang + $asesortambahankurang;

        //Total Nilai Beban Asesor
        $asesorrutinitasnilai = Fterutinitas::where('evaluasidetail_id', $id)
        ->where('asesorrutinitas_status', $diterima)
        ->get();

        $asesortambahannilai = Ftetambahan::where('evaluasidetail_id', $id)
        ->where('asesortambahan_status', $diterima)
        ->get();

        $sumasesorrutinitas = $asesorrutinitasnilai->sum('asesorrutinitas_nilai');
        $sumasesortambahan = $asesortambahannilai->sum('asesortambahan_nilai');
        $sumasesortotal = $sumasesorrutinitas + $sumasesortambahan;

        Hasilevaluasi::create([
            'user_id' => $evaluasidetail->user_id,
            'evaluasidetail_id' => $evaluasidetail->id,
            'tahun_id' => $evaluasidetail->tahun_id,
            'totalkegiatan' => $totalkegiatan,
            'rutinitasditerima' => $rutinitasditerima,
            'tambahanditerima' => $tambahanditerima,
            'rutinitasditolak' => $rutinitasditolak,
            'tambahanditolak' => $tambahanditolak,         
            'totalditerima' => $totalditerima,
            'totalditolak' => $totalditolak,
            'fterutinitaskurang' => $fterutinitaskurang,
            'fterutinitasnormal' => $fterutinitasnormal,
            'fterutinitasberlebihan' => $fterutinitasberlebihan,
            'ftetambahankurang' => $ftetambahankurang,
            'ftetambahannormal' => $ftetambahannormal,
            'ftetambahanberlebihan' => $ftetambahanberlebihan,
            'fteberlebihan'=> $fteberlebihan,
            'ftenormal' => $ftenormal,
            'ftekurang' => $ftekurang,
            'sumfterutinitas' => $sumfterutinitas,
            'sumftetambahan' => $sumftetambahan,
            'sumftetotal' => $sumftetotal,
            'asesorrutinitaskurang' => $asesorrutinitaskurang,
            'asesorrutinitasnormal' => $asesorrutinitasnormal,
            'asesorrutinitasberlebihan' => $asesorrutinitasberlebihan,
            'asesortambahankurang' => $asesortambahankurang,
            'asesortambahannormal' => $asesortambahannormal,
            'asesortambahanberlebihan' => $asesortambahanberlebihan,
            'asesorberlebihan'=> $asesorberlebihan,
            'asesornormal' => $asesornormal,
            'asesorkurang' => $asesorkurang,
            'sumasesorrutinitas' => $sumasesorrutinitas,
            'sumasesortambahan' => $sumasesortambahan,
            'sumasesortotal' => $sumasesortotal,
        ]);

        $evaluasidetail = Evaluasidetail::find($id);
        $evaluasidetail->status = 4;
        $evaluasidetail->save();

        return redirect('/verifikasi/' . $evaluasidetail->id)->with(['evaluasidetail' => $evaluasidetail]);
 
    }

    public function detailsimpulan($id){
 
        $rutinitas = Rutinitas::find($id);
    	return view('verifikasi.detailsimpulan', ['rutinitas' => $rutinitas]);
 
    }

    public function detailsimpulan2($id){
 
        $tambahan = Tambahan::find($id);
    	return view('verifikasi.detailsimpulan2', ['tambahan' => $tambahan]);
 
    }

    public function cetak_pdf($id) {

        $evaluasidetail = Evaluasidetail::where('id', $id)->first();
        
        //return view('verifikasi.laporan_pdf', ['evaluasidetail' => $evaluasidetail]);

        $pdf = Pdf::loadview('verifikasi.laporan_pdf',['evaluasidetail'=>$evaluasidetail]);
        return $pdf->download('laporan.pdf');

    }
}
