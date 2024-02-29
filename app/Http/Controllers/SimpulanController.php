<?php

namespace App\Http\Controllers;

use App\Rutinitas;
use App\Tambahan;
use App\User;
use App\Unit;
use App\Role;
use App\Evaluasi;
use App\Asesor;
use App\Absenrutinitas;
use App\Evaluasidetail;
use App\Hasilevaluasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SimpulanController extends Controller
{
    public function tabelsimpulan(){
 
        $user = User::where('id', Auth::id())->first();
    	return view('simpulan.tabelsimpulan', ['user' => $user]);
 
    }

    public function simpulanmulai($id)
    {
        $statusmulai = 2;
        $evaluasidetail = Evaluasidetail::find($id);
        $evaluasidetail->status = $statusmulai;
        $evaluasidetail->save();

        return redirect('/simpulan/tabelsimpulan');
    }

    public function rencanakegiatan($id)
    {
        $evaluasidetail = Evaluasidetail::where('id', $id)->first();

        $totalkegiatan = $evaluasidetail->rutinitas->count() + $evaluasidetail->tambahan->count();

        return view('simpulan.rencanakegiatan', ['evaluasidetail' => $evaluasidetail, 'totalkegiatan' => $totalkegiatan]);
    }

    public function simpulan(){
 
    	return view('simpulan.simpulankegiatan');
 
    }

	public function detailrencana($id){
 
        $rutinitas = Rutinitas::find($id);
    	return view('simpulan.detailrencana', ['rutinitas' => $rutinitas]);

    }

    public function detailrencana2($id){
 
        $tambahan = Tambahan::find($id);
    	return view('simpulan.detailrencana2', ['tambahan' => $tambahan]);
        
    }

    public function rencanaselesai($id){

        $statuspertengahan = 3;
        $evaluasidetail = Evaluasidetail::find($id);
        $evaluasidetail->status = $statuspertengahan;
        $evaluasidetail->save();

        return redirect('/simpulan/rencanakegiatan/' . $evaluasidetail->id)->with(['evaluasidetail' => $evaluasidetail]);
    }

    public function laporankegiatan($id) {

        $evaluasidetail = Evaluasidetail::where('user_id', Auth::id())->where('evaluasi_id', $id)->first();
        
        return view('simpulan.simpulankegiatan', ['evaluasidetail' => $evaluasidetail]);

    }

    public function detailsimpulan($id){
 
        $rutinitas = Rutinitas::find($id);
    	return view('simpulan.detailsimpulan', ['rutinitas' => $rutinitas]);
 
    }

    public function detailsimpulan2($id){
 
        $tambahan = Tambahan::find($id);
    	return view('simpulan.detailsimpulan2', ['tambahan' => $tambahan]);
 
    }
}
