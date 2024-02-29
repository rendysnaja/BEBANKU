<?php

namespace App\Http\Controllers;

use App\User;
use App\Unit;
use App\Role;
use App\Evaluasi;
use App\Asesor;
use App\Rutinitas;
use App\Tambahan;
use App\Evaluasidetail;
use App\Tahun;
use App\Hasilevaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ManajemenController extends Controller
{
    public function manajemenuser()
    {
        $user = User::all();
        return view('manajemen.tabeluser', ['user' => $user]);
    }

    public function register()
    {
        $unit = Unit::all();
        $role = Role::all();
        return view('manajemen/register2', ['unit' => $unit], ['role' => $role]);
    }

    public function registeraction(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'unit' => 'required',
            'jabatan' => 'required',
            'role' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $request = new User([
            'name' => $request->nama,
            'username' => $request->email,
            'email' => $request->email,
            'role_id' => $request->role,
            'unit_id' => $request->unit,
            'jabatan' => $request->jabatan,
            'password' => Hash::make($request->password),
        ]);

        $request->save();

        Asesor::create([
            'user_id' => $request->id,
        ]);

        return redirect('/manajemen/user');
    }

    public function edituser($id)
    {
        $user = User::find($id);
        $unit = Unit::all();
        $role = Role::all();
        return view('manajemen.edituser', ['user' => $user, 'unit' => $unit, 'role' => $role]);
    }

    public function userupdate($id, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'unit' => 'required',
            'jabatan' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->nama;
        $user->username = $request->email;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->unit_id = $request->unit;
        $user->jabatan = $request->jabatan;
        $user->password = Hash::make($request->password);
        $user->save();

        // $asesor = Asesor::where('user_id',$id)->first();
        // $asesor->user_id = $request->id;

        // Asesor::create([
        //     'user_id' => $request->id,
        // ]);

        return redirect('/manajemen/user');
    }

    public function hapususer($id)
    {
        $asesor = Asesor::where('user_id',$id)->first();
        $asesor->delete();

        $user = User::find($id);
        $user->delete();
        return redirect('/manajemen/user');
    }

    public function tabelunit()
    {
        $unit = Unit::all();
        return view('manajemen.tabelunit', ['unit' => $unit]);
    }

    public function tambahunit()
    {
        return view('manajemen/tambahunit');
    }

    public function unitstore(Request $request)
    {
        Unit::create([
            'unit_nama' => $request->nama,
        ]);

        return redirect('/manajemen/unit');
    }

    public function editunit($id)
    {
        $unit = Unit::find($id);
        return view('manajemen/editunit',  ['unit' => $unit]);
    }

    public function updateunit($id, Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $unit = Unit::find($id);
        $unit->unit_nama = $request->nama;
        $unit->save();

        return redirect('/manajemen/unit');
    }

    public function hapusunit($id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        return redirect('/manajemen/unit');
    }

    public function manajemenevaluasi()
    {
        $evaluasi = Evaluasi::all();
        return view('manajemen.tabelevaluasi', ['evaluasi' => $evaluasi]);
    }

    public function tambahevaluasi()
    {
        $tahun = Tahun::all();
        return view('manajemen/tambahevaluasi',['tahun' => $tahun]);
    }

    public function evaluasistore(Request $request)
    {
        $this->validate($request, [
            'periode' => 'required',
            'tahun' => 'required',
            'mulai' => 'required',
            'berakhir' => 'required',
        ]);

        Evaluasi::create([
            'evaluasi_periode' => $request->periode,
            'tahun_id' => $request->tahun,
            'evaluasi_mulai' => $request->mulai,
            'evaluasi_berakhir' => $request->berakhir,
        ]);

        return redirect('/manajemen/evaluasi');
    }

    public function editevaluasi($id)
    {
        $evaluasi = Evaluasi::find($id);
        return view('manajemen/editevaluasi',  ['evaluasi' => $evaluasi]);
    }

    public function evaluasiupdate($id, Request $request)
    {
        $request->validate([
            'periode' => 'required',
            'mulai' => 'required',
            'berakhir' => 'required',
        ]);

        $evaluasi = Evaluasi::find($id);
        $evaluasi->evaluasi_periode = $request->periode;
        $evaluasi->evaluasi_mulai = $request->mulai;
        $evaluasi->evaluasi_berakhir= $request->berakhir;
        $evaluasi->save();

        return redirect('/manajemen/evaluasi');
    }

    public function hapusevaluasi($id)
    {
        $evaluasi = Evaluasi::find($id);
        $evaluasi->delete();
        return redirect('/manajemen/evaluasi');
    }

    public function evaluasidetail($id)
    {
        $evaluasi = Evaluasi::find($id);
        $evaluasidetail = Evaluasidetail::where('evaluasi_id',$id)->get();
        
        return view('manajemen.evaluasidetail', ['evaluasi' => $evaluasi,'evaluasidetail' => $evaluasidetail]);
    }

    public function tambahpeserta($id)
    {
        $evaluasi = Evaluasi::find($id);
        $user = User::all();
        $unit = Unit::all();
        $asesor = Asesor::all();
        return view('manajemen.tambahpeserta', ['evaluasi' => $evaluasi, 'user' => $user, 'asesor' => $asesor, 'unit' => $unit]);
    }

    public function evaldetailstore($id, Request $request)
    {
        $this->validate($request, [
            'asesi' => 'required',
            'asesor' => 'required',
            'unit' => 'required',
        ]);

        $data = '1';

        $evaluasi = Evaluasi::find($id);

        Evaluasidetail::create([
            'evaluasi_id' => $id,
            'tahun_id' => $evaluasi->id,
            'user_id' => $request->asesi,
            'asesor_id' => $request->asesor,
            'unit_id' => $request->unit,
            'status' => $data,
        ]);

        return redirect('/manajemen/evaluasidetail/'.$evaluasi->id)->with(['evaluasi'=>$evaluasi]);
    }

    public function editevaldetail($id)
    {
        $evaluasidetail = Evaluasidetail::find($id);
        $user = User::all();
        $unit = Unit::all();
        $asesor = Asesor::all();
        return view('manajemen/editpeserta',  ['evaluasidetail' => $evaluasidetail, 'user' => $user, 'asesor' => $asesor, 'unit' => $unit]);
    }

    public function updateevaldetail($id, Request $request)
    {
        $request->validate([
            'asesi' => 'required',
            'asesor' => 'required',
            'unit' => 'required',
        ]);

        $evaluasidetail = Evaluasidetail::find($id);
        $evaluasidetail->user_id = $request->asesi;
        $evaluasidetail->asesor_id = $request->asesor;
        $evaluasidetail->unit_id = $request->unit;
        $evaluasidetail->save();

        $evaluasi = Evaluasi::find($evaluasidetail->evaluasi_id);
        return redirect('/manajemen/evaluasidetail/'.$evaluasi->id)->with(['evaluasi'=>$evaluasi]);
    }

    public function hapusevaldetail($id)
    {
        $evaluasidetail = Evaluasidetail::find($id);
        $evaluasidetail->delete();
        
        $evaluasi = Evaluasi::find($evaluasidetail->evaluasi_id);
        return redirect('/manajemen/evaluasidetail/'.$evaluasi->id)->with(['evaluasi'=>$evaluasi]);
    }

    public function evaluasimulai($id)
    {
        $statusmulai = 2;
        $evaluasidetail = Evaluasidetail::find($id);
        $evaluasidetail->status = $statusmulai;
        $evaluasidetail->save();

        $evaluasi = Evaluasi::find($evaluasidetail->evaluasi_id);

        return redirect('manajemen/evaluasidetail/'.$evaluasi->id)->with(['evaluasi'=>$evaluasi]);
        
    }

    public function laporan($id) {

        $evaluasidetail = Evaluasidetail::where('id', $id)->first();
        
        return view('manajemen.laporankegiatan', ['evaluasidetail' => $evaluasidetail]);

    }

    public function detaillaporan($id){
 
        $rutinitas = Rutinitas::find($id);
    	return view('manajemen.detailsimpulan', ['rutinitas' => $rutinitas]);
 
    }

    public function detaillaporan2($id){
 
        $tambahan = Tambahan::find($id);
    	return view('manajemen.detailsimpulan2', ['tambahan' => $tambahan]);
 
    }

    public function tabeltahun()
    {
        $tahun = Tahun::all();
        return view('manajemen.tabeltahun', ['tahun' => $tahun]);
    }

    public function tambahtahun()
    {
        return view('manajemen/tambahtahun');
    }

    public function storetahun(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'kelonggaran' => 'required',
        ]);

        Tahun::create([
            'tahun_nama' => $request->nama,
            'tahun_jumlahhari' => $request->jumlah,
            'tahun_kelonggaran' => $request->kelonggaran,
        ]);

        return redirect('/manajemen/tahun');
    }

    public function edittahun($id)
    {
        $tahun = Tahun::find($id);
        return view('manajemen/edittahun',  ['tahun' => $tahun]);
    }

    public function updatetahun($id, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'kelonggaran' => 'required',
        ]);

        $tahun = Tahun::find($id);
        $tahun->tahun_nama = $request->nama;
        $tahun->tahun_jumlahhari = $request->jumlah;
        $tahun->tahun_kelonggaran = $request->kelonggaran;
        $tahun->save();

        return redirect('/manajemen/tahun');
    }

    public function hapustahun($id)
    {
        $tahun = Tahun::find($id);
        $tahun->delete();
        return redirect('/manajemen/tahun');
    }

    public function laporantahunan()
    {
        $tahun = Tahun::all();
        return view('manajemen.tabellaporantahunan', ['tahun' => $tahun]);
    }

    public function tahunandetail($id)
    {
        $tahun = Tahun::find($id);
        $user = User::all();
        return view('manajemen.tahunandetail', ['tahun' => $tahun, 'user' => $user]);
    }

    public function tahunanreport($tahunid, $userid)
    {
        $user = User::find($userid);
        $evaluasidetail = Evaluasidetail::where('user_id', $userid)->where('tahun_id', $tahunid)->get();
        $hasilevaluasi = Hasilevaluasi::where('user_id', $userid)->where('tahun_id', $tahunid)->get();

        $hasilcount = $hasilevaluasi->count();
        $sumfte1 = $hasilevaluasi->sum('sumftetotal');
        $sumfte = $sumfte1 / $hasilcount;
        $sumasesor1 = $hasilevaluasi->sum('sumasesortotal');
        $sumasesor = $sumasesor1 / $hasilcount;

        return view('manajemen.tahunanreport', [
            'evaluasidetail' => $evaluasidetail, 
            'user'=>$user, 
            'sumfte'=>$sumfte,
            'sumasesor' => $sumasesor,
        ]);
    }
}
