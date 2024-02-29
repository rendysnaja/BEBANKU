<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BisaController;
use App\Http\Controllers\MalasngodingController;
use App\Http\Controllers\HarianController;
use App\Http\Controllers\AbsenharianController;
use App\Http\Controllers\TambahanController;
use App\Http\Controllers\AbsentambahanController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SimpulanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Login

Route::get('/', function () {
    return view('login.login');
});

Route::get('/rbac', function () {
    return view('login.rbac');
});

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login/action', [UserController::class, 'login_action'])->name('login.action');
// Route::get('login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/forgot-password', function () {
    return view('login.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('login.reset-password', ['token' => $token]);
    // return 'berhasil kirim email notifikasi reset password';
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

//Dashboard
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware('auth');
    Route::get('asesi', [DashboardController::class, 'dashboardasesi'])->middleware('auth');
    Route::get('asesor', [DashboardController::class, 'dashboardasesor'])->middleware('auth');
    Route::get('admin', [DashboardController::class, 'dashboardadmin']);
});

//Izin dan Cuti
Route::get('/tabelizin', [IzinController::class, 'tabelizin']);
Route::get('/tambahizin', [IzinController::class, 'tambahizin']);
Route::post('/izinstore', [IzinController::class, 'izinstore']);
Route::get('/editizin/{id}', [IzinController::class, 'editizin']);
Route::post('/izinupdate/{id}', [IzinController::class, 'izinupdate']);
Route::get('/izinhapus/{id}', [IzinController::class, 'izinhapus']);
Route::get('/izin/download/{id}', [IzinController::class, 'izindownload']);

//Harian CRUD
Route::get('/harian', [harianController::class, 'harian']);
Route::get('/harian/tambah', [HarianController::class, 'hariantambah']);
Route::post('/harian/store', [HarianController::class, 'harianstore']);
Route::get('/harian/edit/{id}', [HarianController::class, 'harianedit']);
Route::put('/harian/update/{id}', [HarianController::class, 'harianupdate']);
Route::get('/harian/hapus/{id}', [HarianController::class, 'harianhapus']);
Route::get('/harian/download/{id}', [HarianController::class, 'hariandownload']);
Route::get('/harian/filehapus/{id}', [HarianController::class, 'hapusfile']);
Route::get('/harian/absen/{id}', [HarianController::class, 'harianabsen']);
Route::get('/absen/tambah/{id}', [AbsenharianController::class, 'absenhariantambah']);
Route::post('/absen/harianstore/{id}', [AbsenharianController::class, 'absenharianstore']);
Route::get('/absen/edit/{id}', [AbsenharianController::class, 'harianabsenedit']);
Route::post('/absen/update/{id}', [AbsenharianController::class, 'harianabsenupdate']);
Route::get('/absen/hapus/{id}', [AbsenharianController::class, 'harianabsenhapus']);
Route::get('/absen/detail/{id}', [AbsenharianController::class, 'harianabsendetail']);
Route::get('/absenharian/download/{id}', [AbsenharianController::class, 'harianabsendownload']);
Route::get('/harian/view/{id}', [HarianController::class, 'harianview']);

//Tambahan CRUD
Route::get('/tambahan', [TambahanController::class, 'tambahan']);
Route::get('/tambahan/tambah', [TambahanController::class, 'tambahantambah']);
Route::post('/tambahan/store', [TambahanController::class, 'tambahanstore']);
Route::get('/tambahan/edit/{id}', [TambahanController::class, 'tambahanedit']);
Route::put('/tambahan/update/{id}', [TambahanController::class, 'tambahanupdate']);
Route::get('/tambahan/hapus/{id}', [TambahanController::class, 'tambahanhapus']);
Route::get('/tambahan/absen/{id}', [TambahanController::class, 'tambahanabsen']);
Route::get('/tambahan/download/{id}', [TambahanController::class, 'tambahandownload']);
Route::get('/absen2/tambah/{id}', [AbsentambahanController::class, 'absentambahantambah']);
Route::post('/absen2/tambahanstore/{id}', [AbsentambahanController::class, 'absentambahanstore']);
Route::get('/absen2/edit/{id}', [AbsentambahanController::class, 'tambahanabsenedit']);
Route::post('/absen2/update/{id}', [AbsentambahanController::class, 'tambahanabsenupdate']);
Route::get('/absen2/hapus/{id}', [AbsentambahanController::class, 'tambahanabsenhapus']);
Route::get('/absen2/download/{id}', [AbsentambahanController::class, 'tambahanabsendownload']);

//Simpulan Kegiatan
Route::get('/simpulan', [SimpulanController::class, 'simpulan']);
Route::get('/simpulan/tabelsimpulan', [SimpulanController::class, 'tabelsimpulan']);
Route::get('/simpulan/mulai/{id}', [SimpulanController::class, 'simpulanmulai']);
Route::get('/simpulan/rencanakegiatan/{id}', [SimpulanController::class, 'rencanakegiatan']);
Route::get('/simpulan/detailrencana/{id}', [SimpulanController::class, 'detailrencana']);
Route::get('/simpulan/detailrencana2/{id}', [SimpulanController::class, 'detailrencana2']);
Route::get('/simpulan/rencanaselesai/{id}', [SimpulanController::class, 'rencanaselesai']);
Route::get('/simpulan/laporankegiatan/{id}', [SimpulanController::class, 'laporankegiatan']);
Route::get('/simpulan/detail/{id}', [SimpulanController::class, 'detailsimpulan']);
Route::get('/simpulan/detail2/{id}', [SimpulanController::class, 'detailsimpulan2']);

//Verifikasi Kegiatan
Route::get('/verifikasi/peserta', [VerifikasiController::class, 'verifikasipeserta']);
Route::get('/verifikasi/{id}', [VerifikasiController::class, 'verifikasi']);
Route::get('/verifikasi/kegiatan/{id}', [VerifikasiController::class, 'verifikasikegiatan']);
Route::post('/verifikasi/store/{id}', [VerifikasiController::class, 'verifikasistore']);
Route::get('/verifikasi/kegiatanedit/{id}', [VerifikasiController::class, 'verifikasikegiatanedit']);
Route::post('/verifikasi/kegiatanupdate/{id}', [VerifikasiController::class, 'verifikasikegiatanupdate']);
Route::get('/verifikasi/kegiatan2/{id}', [VerifikasiController::class, 'verifikasikegiatan2']);
Route::post('/verifikasi/store2/{id}', [VerifikasiController::class, 'verifikasistore2']);
Route::get('/verifikasi/kegiatanedit2/{id}', [VerifikasiController::class, 'verifikasikegiatanedit2']);
Route::post('/verifikasi/kegiatanupdate2/{id}', [VerifikasiController::class, 'verifikasikegiatanupdate2']);
Route::get('/verifikasi/selesai/{id}', [VerifikasiController::class, 'verifikasiselesai']);
Route::get('/verifikasi/detail/{id}', [VerifikasiController::class, 'detailsimpulan']);
Route::get('/verifikasi/detail2/{id}', [VerifikasiController::class, 'detailsimpulan2']);
Route::get('/verifikasi/cetak_pdf/{id}',  [VerifikasiController::class, 'cetak_pdf']);

//Manajemen 
Route::group(['prefix' => 'manajemen'], function () {
    Route::get('user', [ManajemenController::class, 'manajemenuser']);
    Route::get('register', [ManajemenController::class, 'register'])->name('register');
    Route::post('register/store', [ManajemenController::class, 'registeraction']);
    Route::get('edituser/{id}', [ManajemenController::class, 'edituser']);
    Route::post('updateuser/{id}', [ManajemenController::class, 'userupdate']);
    Route::get('hapususer/{id}', [ManajemenController::class, 'hapususer']);
    Route::get('unit', [ManajemenController::class, 'tabelunit']);
    Route::get('tambahunit', [ManajemenController::class, 'tambahunit']);
    Route::post('unit/store', [ManajemenController::class, 'unitstore']);
    Route::get('unitedit/{id}', [ManajemenController::class, 'editunit']);
    Route::post('updateunit/{id}', [ManajemenController::class, 'updateunit']);
    Route::get('hapusunit/{id}', [ManajemenController::class, 'hapusunit']);
    Route::get('evaluasi', [ManajemenController::class, 'manajemenevaluasi']);
    Route::get('tambahevaluasi', [ManajemenController::class, 'tambahevaluasi']);
    Route::post('evaluasi/store', [ManajemenController::class, 'evaluasistore']);
    Route::get('editevaluasi/{id}', [ManajemenController::class, 'editevaluasi']);
    Route::post('updateevaluasi/{id}', [ManajemenController::class, 'evaluasiupdate']);
    Route::get('hapusevaluasi/{id}', [ManajemenController::class, 'hapusevaluasi']);
    Route::get('evaluasidetail/{id}', [ManajemenController::class, 'evaluasidetail']);
    Route::get('evaldetailtambah/{id}', [ManajemenController::class, 'tambahpeserta']);
    Route::post('evaldetail/store/{id}', [ManajemenController::class, 'evaldetailstore']);
    Route::get('evaldetailedit/{id}', [ManajemenController::class, 'editevaldetail']);
    Route::post('updateevaldetail/{id}', [ManajemenController::class, 'updateevaldetail']);
    Route::get('hapusevaldetail/{id}', [ManajemenController::class, 'hapusevaldetail']);
    Route::get('evaluasimulai/{id}', [ManajemenController::class, 'evaluasimulai']);
    Route::get('laporan/{id}', [ManajemenController::class, 'laporan']);
    Route::get('detaillaporan/{id}', [ManajemenController::class, 'detaillaporan']);
    Route::get('detaillaporan2/{id}', [ManajemenController::class, 'detaillaporan2']);
    Route::get('tahun', [ManajemenController::class, 'tabeltahun']);
    Route::get('tambahtahun', [ManajemenController::class, 'tambahtahun']);
    Route::post('tahun/store', [ManajemenController::class, 'storetahun']);
    Route::get('tahunedit/{id}', [ManajemenController::class, 'edittahun']);
    Route::post('updatetahun/{id}', [ManajemenController::class, 'updatetahun']);
    Route::get('hapustahun/{id}', [ManajemenController::class, 'hapustahun']);
    Route::get('laporantahunan', [ManajemenController::class, 'laporantahunan']);
    Route::get('detailtahunan/{id}', [ManajemenController::class, 'tahunandetail']);
    Route::get('tahunanreport/{tahunid}/{userid}', [ManajemenController::class, 'tahunanreport']);
});


//Belajar
Route::get('/harianbelajar', [HarianController::class, 'index']);
Route::get('/karyawan', 'PegawaiController@index2');
Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']);
Route::post('/pegawai/update', [PegawaiController::class, 'update']);
Route::get('/pegawai/hapus/{id}', [PegawaiController::class, 'hapus']);
Route::get('/pegawai/cari', [PegawaiController::class, 'cari']);

Route::get('/index3', [PegawaiController::class, 'index3']);

Route::get('/input', [MalasngodingController::class, 'input']);

Route::post('/proses', [MalasngodingController::class, 'proses']);

Route::get('/index4', [PegawaiController::class, 'index4']);

// Route::get('/harian/absen/{id}', function () {
//     return view('absenharian');
// });

// Route::get('/harian', function () {
//     return view('inputharian');
// });

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/nyoba', function () {
    return view('nyoba');
});

// Route::get('/tambah', function () {
//     return view('tambah');
// });

// Route::get('tambahin','BlogController@tambah');
//Route::get('/pegawai/kokbisa','BisaController@tambah');
// Route::get('/pegawai/kokbisa', [BisaController::class, 'tambah']);
//Route::get('/pegawai/kokbisasih', [BisaController::class, 'tambahin']);

Route::get('halo', function () {
    return "Halo, Selamat datang di tutorial laravel www.malasngoding.com";
});

//Route::get('blog', function () { 
//});

Route::get('/blog', 'BlogController@home');
Route::get('/blog/tentang', 'BlogController@tentang');
Route::get('/blog/kontak', 'BlogController@kontak');

Route::get('dosen', 'DosenController@index');

// Route::get('/pegawai/{malasngoding}', 'PegawaiController@index');

Route::get('/formulir', 'PegawaiController@tambah');
Route::post('/formulir/proses', 'PegawaiController@proses');

//Ini Route CRUD
// Route::get('/pegawai','PegawaiController@index');
Route::get('/pegawai/tambah', 'PegawaiController@tambah');
Route::get('/abc', [PegawaiController::class, 'tambah']);

Route::post('/pegawai/store', 'PegawaiController@store');

Route::group(['prefix' => 'email'], function () {
    Route::get('inbox', function () {
        return view('pages.email.inbox');
    });
    Route::get('read', function () {
        return view('pages.email.read');
    });
    Route::get('compose', function () {
        return view('pages.email.compose');
    });
});

Route::group(['prefix' => 'apps'], function () {
    Route::get('chat', function () {
        return view('pages.apps.chat');
    });
    Route::get('calendar', function () {
        return view('pages.apps.calendar');
    });
});

Route::group(['prefix' => 'ui-components'], function () {
    Route::get('accordion', function () {
        return view('pages.ui-components.accordion');
    });
    Route::get('alerts', function () {
        return view('pages.ui-components.alerts');
    });
    Route::get('badges', function () {
        return view('pages.ui-components.badges');
    });
    Route::get('breadcrumbs', function () {
        return view('pages.ui-components.breadcrumbs');
    });
    Route::get('buttons', function () {
        return view('pages.ui-components.buttons');
    });
    Route::get('button-group', function () {
        return view('pages.ui-components.button-group');
    });
    Route::get('cards', function () {
        return view('pages.ui-components.cards');
    });
    Route::get('carousel', function () {
        return view('pages.ui-components.carousel');
    });
    Route::get('collapse', function () {
        return view('pages.ui-components.collapse');
    });
    Route::get('dropdowns', function () {
        return view('pages.ui-components.dropdowns');
    });
    Route::get('list-group', function () {
        return view('pages.ui-components.list-group');
    });
    Route::get('media-object', function () {
        return view('pages.ui-components.media-object');
    });
    Route::get('modal', function () {
        return view('pages.ui-components.modal');
    });
    Route::get('navs', function () {
        return view('pages.ui-components.navs');
    });
    Route::get('navbar', function () {
        return view('pages.ui-components.navbar');
    });
    Route::get('pagination', function () {
        return view('pages.ui-components.pagination');
    });
    Route::get('popovers', function () {
        return view('pages.ui-components.popovers');
    });
    Route::get('progress', function () {
        return view('pages.ui-components.progress');
    });
    Route::get('scrollbar', function () {
        return view('pages.ui-components.scrollbar');
    });
    Route::get('scrollspy', function () {
        return view('pages.ui-components.scrollspy');
    });
    Route::get('spinners', function () {
        return view('pages.ui-components.spinners');
    });
    Route::get('tabs', function () {
        return view('pages.ui-components.tabs');
    });
    Route::get('tooltips', function () {
        return view('pages.ui-components.tooltips');
    });
});

Route::group(['prefix' => 'advanced-ui'], function () {
    Route::get('cropper', function () {
        return view('pages.advanced-ui.cropper');
    });
    Route::get('owl-carousel', function () {
        return view('pages.advanced-ui.owl-carousel');
    });
    Route::get('sortablejs', function () {
        return view('pages.advanced-ui.sortablejs');
    });
    Route::get('sweet-alert', function () {
        return view('pages.advanced-ui.sweet-alert');
    });
});

Route::group(['prefix' => 'forms'], function () {
    Route::get('basic-elements', function () {
        return view('pages.forms.basic-elements');
    });
    Route::get('advanced-elements', function () {
        return view('pages.forms.advanced-elements');
    });
    Route::get('editors', function () {
        return view('pages.forms.editors');
    });
    Route::get('wizard', function () {
        return view('pages.forms.wizard');
    });
});



Route::group(['prefix' => 'charts'], function () {
    Route::get('apex', function () {
        return view('pages.charts.apex');
    });
    Route::get('chartjs', function () {
        return view('pages.charts.chartjs');
    });
    Route::get('flot', function () {
        return view('pages.charts.flot');
    });
    Route::get('peity', function () {
        return view('pages.charts.peity');
    });
    Route::get('sparkline', function () {
        return view('pages.charts.sparkline');
    });
});

Route::group(['prefix' => 'tables'], function () {
    Route::get('basic-tables', function () {
        return view('pages.tables.basic-tables');
    });
    Route::get('data-table', function () {
        return view('pages.tables.data-table');
    });
});

Route::group(['prefix' => 'icons'], function () {
    Route::get('feather-icons', function () {
        return view('pages.icons.feather-icons');
    });
    Route::get('mdi-icons', function () {
        return view('pages.icons.mdi-icons');
    });
});

Route::group(['prefix' => 'general'], function () {
    Route::get('blank-page', function () {
        return view('pages.general.blank-page');
    });
    Route::get('faq', function () {
        return view('pages.general.faq');
    });
    Route::get('invoice', function () {
        return view('pages.general.invoice');
    });
    Route::get('profile', function () {
        return view('pages.general.profile');
    });
    Route::get('pricing', function () {
        return view('pages.general.pricing');
    });
    Route::get('timeline', function () {
        return view('pages.general.timeline');
    });
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', function () {
        return view('pages.auth.login');
    });
    Route::get('register', function () {
        return view('pages.auth.register');
    });
    // Route::get('coba', 'PegawaiController@coba');

});

Route::get('coba', 'PegawaiController@coba');

Route::group(['prefix' => 'error'], function () {
    Route::get('404', function () {
        return view('pages.error.404');
    });
    Route::get('500', function () {
        return view('pages.error.500');
    });
});

//Route::get('/clear-cache', function() {
//   Artisan::call('cache:clear');
//    return "Cache is cleared";
//});

// 404 for undefined routes
//Route::any('/{page?}',function(){
//   return View::make('pages.error.404');
//})->where('page','.*');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
