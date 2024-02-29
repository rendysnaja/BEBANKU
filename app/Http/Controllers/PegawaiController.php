<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Karyawan; 
 
class PegawaiController extends Controller
{

    public function coba()
    {
        
        // memanggil view tambah
        return view('percobaan');
    
    }

	public function index4(){
 
    	// mengambil data dari table pegawai
    	$pegawai = DB::table('pegawai')->get();
 
    	// mengirim data pegawai ke view index
    	return view('index4',['pegawai' => $pegawai]);
 
    }

    public function index3(){
 
    	// mengambil data dari table pegawai
    	$pegawai = DB::table('pegawai')->paginate(5);
 
    	// mengirim data pegawai ke view index
    	return view('index3',['pegawai' => $pegawai]);
 
    }

    public function index(){
 
    	// mengambil data dari table pegawai
    	$pegawai = DB::table('pegawai')->get();
 
    	// mengirim data pegawai ke view index
    	return view('index2',['pegawai' => $pegawai]);
 
    }

    // method untuk menampilkan view form tambah pegawai
    public function tambah()
    {
        
        // memanggil view tambah
        return view('tambah');
    
     }

    public function store(Request $request){

        // insert data ke table pegawai
        DB::table('pegawai')->insert([
            'pegawai_nama' => $request->nama,
            'pegawai_jabatan' => $request->jabatan,
            'pegawai_umur' => $request->umur,
            'pegawai_alamat' => $request->alamat
        ]);

        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
        
    }

    public function edit($id)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$pegawai = DB::table('pegawai')->where('pegawai_id',$id)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
		return view('edit',['pegawai' => $pegawai]);
	
	}

	public function update(Request $request)
	{
		// update data pegawai
		DB::table('pegawai')->where('pegawai_id',$request->id)->update([
			'pegawai_nama' => $request->nama,
			'pegawai_jabatan' => $request->jabatan,
			'pegawai_umur' => $request->umur,
			'pegawai_alamat' => $request->alamat
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/pegawai');
	}

	public function hapus($id)
	{
		// menghapus data pegawai berdasarkan id yang dipilih
		DB::table('pegawai')->where('pegawai_id',$id)->delete();
			
		// alihkan halaman ke halaman pegawai
		return redirect('/harian');
	}

	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$pegawai = DB::table('pegawai')
		->where('pegawai_nama','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('index2',['pegawai' => $pegawai]);
 
	}

    public function formulir(){
 
    	return view('formulir');
 
    }

    public function proses(Request $request){
        $nama = $request->input('namakegiatan');
     	$tanggal = $request->input('tanggalkegiatan');
        return "Nama : ".$nama.", Tanggal Kegiatan : ".$tanggal;
	}

	// DASHBOARD
	public function dashboard(){
 
    	return view('dashboard.dashboard');
 
    }

	// CRUD IZIN
	public function tabelizin(){
 
    	return view('izin.tabelizin');
 
    }

	public function tambahizin(){
 
    	return view('izin.tambahizin');
 
    }

	public function editizin(){
 
    	return view('izin.editizin');
 
    }

	// CRUD HARIAN
	public function harian(){
 
    	$harian = DB::table('harian')->get();
 
    	// mengirim data pegawai ke view index
    	return view('rutinitas.tabelharian',['harian' => $harian]);
 
    }

	public function hariantambah(){
 
    	return view('rutinitas.inputharian');
 
    }

	public function harianstore(Request $request){

        // insert data ke table pegawai
        DB::table('harian')->insert([
            'harian_nama' => $request->nama,
            'harian_tanggal' => $request->tanggal,
            'harian_lama' => $request->lama,
            'harian_pelaksana' => $request->pelaksana,
			'harian_bukti' => $request->bukti
        ]);

        // alihkan halaman ke halaman pegawai
        return redirect('/harian');
        
    }

	public function harianedit($id)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$harian = DB::table('harian')->where('harian_id',$id)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
		return view('rutinitas.editharian',['harian' => $harian]);
	
	}

	public function harianupdate(Request $request)
	{
		// update data harian
		DB::table('harian')->where('harian_id',$request->id)->update([
			'harian_nama' => $request->nama,
            'harian_tanggal' => $request->tanggal,
            'harian_lama' => $request->lama,
            'harian_pelaksana' => $request->pelaksana,
			'harian_bukti' => $request->bukti
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/harian');
	}

	public function harianabsen($id)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$harian = DB::table('harian')->where('harian_id',$id)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
		return view('rutinitas.absenharian',['harian' => $harian]);
	
	}

	public function harianabsentambah(){
 
    	return view('rutinitas.inputabsenharian');
 
    }

	public function harianabsenedit(){
 
    	return view('rutinitas.editabsenharian');
 
    }

	// CRUD TAMBAHAN
	public function tambahan(){
 
    	$harian = DB::table('harian')->get();
 
    	// mengirim data pegawai ke view index
    	return view('tambahan.tabeltambahan',['harian' => $harian]);
 
    }

	public function tambahantambah(){
 
    	return view('tambahan.inputtambahan');
 
    }

	public function tambahanedit($id)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$harian = DB::table('harian')->where('harian_id',$id)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
		return view('tambahan.edittambahan',['harian' => $harian]);
	
	}

	public function tambahanabsen($id)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$harian = DB::table('harian')->where('harian_id',$id)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
		return view('tambahan.absentambahan',['harian' => $harian]);
	
	}

	public function tambahanabsentambah(){
 
    	return view('tambahan.inputabsentambahan');
 
    }

	public function tambahanabsenedit(){
 
    	return view('tambahan.editabsentambahan');
 
    }

	//SIMPULAN KEGIAtAN

	public function simpulan(){
 
    	return view('simpulan.simpulankegiatan');
 
    }

	public function detailsimpulan(){
 
    	return view('simpulan.detailsimpulan');
 
    }

	public function tabelsimpulan(){
 
    	return view('simpulan.tabelsimpulan');
 
    }

	public function rencanakegiatan(){
 
    	return view('simpulan.rencanakegiatan');
 
    }

	public function detailrencana(){
 
    	return view('simpulan.detailrencana');
 
    }

	//VERIFIKASI KEGIATAN
	public function verifikasi(){
 
    	return view('verifikasi.verifikasi');
 
    }

	public function verifikasikegiatan(){
 
    	return view('verifikasi.verifikasikegiatan');
 
    }

	public function verifikasipeserta(){
 
    	return view('verifikasi.daftarpeserta');
 
    }

	//BELAJARR

	public function index2()
    {
    	// mengambil data pegawai
    	$karyawan = Karyawan::all();
 
    	// mengirim data pegawai ke view pegawai
    	return view('karyawan', ['karyawan' => $karyawan]);
    }

	
	

}