<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Bidan\HistoryController;
use App\Http\Controllers\kirimEmailController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\ImportDiagnosisController;
use App\Http\Controllers\ImportLabController;
use App\Http\Controllers\ImportObatController;
use App\Http\Controllers\ImportRoomController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Documentation\AddParamAndRequest;
use App\Http\Livewire\Drug\Create;
use App\Http\Livewire\Drug\Index;
use App\Http\Livewire\Lab\Create as LabCreate;
use App\Http\Livewire\Lab\Index as LabIndex;
use App\Models\Immunization;
use App\Models\Familyplanning;
use App\Models\Pregnantmom;
use Illuminate\Support\Facades\Route;

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

Route::get("/coba", [CobaController::class, "index"]);

$list_menu = [
    'lab' => 'lab',
    'drug' => 'obat',
    'patient' => 'pasien',
    'medicalrecord' => 'rekam-medis',
    'user' => 'user',
    'room' => 'ruangan',
    'diagnosis' => 'diagnosis',
    'queue' => 'antrian',
    'service' => 'layanan',
    'pregnantmom' => 'ibu-hamil',
    'familyplanning' => 'keluargaberencana',
    'immunization' => 'imunisasi',
    'bpjs' => 'bpjs',
    'documentation' => 'dokumentasi',
    'parameter' => 'parameter',
    'response' => 'response',
    'nota' => 'nota',
    'jasa' => 'jasa',
    'history' => 'history',
    'profile' => 'profile',
    'progres' => 'progres',
    'jalan' => 'jalan',
    'detailpatient' => 'detailpatient',
    'detailpemeriksaan' => 'detailpemeriksaan'

];


Route::middleware(['auth:web'])->group(function () use ($list_menu) {
    Route::get('/show/{immunization}', \App\Http\Livewire\Immunization\Show::class)->name('immunization.show');
    Route::get('/show/{pregnantmom}', \App\Http\Livewire\Pregnantmom\Show::class)->name('pregnantmom.show');
    Route::get('/dokumentasi_api', [\App\Http\Controllers\DokumentasiController::class,'index'])->name('dokumentasi_api');

    Route::get('/', function () {
        return view('welcome');
    })->name('home');


    Route::get("/readuser", [UserController::class,'readuser']);
    Route::get('progres/process/{queue}', \App\Http\Livewire\Progres\Process::class)->name('progres.process');
    Route::get('progres/selesai/{queue}', \App\Http\Livewire\Progres\Selesai::class)->name('progres.selesai');
    Route::get('progres/history/{queue}', \App\Http\Livewire\Progres\History::class)->name('progres.history');
    Route::get('jalan/history/{queue}', \App\Http\Livewire\Jalan\History::class)->name('jalan.history');
    Route::get('detailpatient/{patient}', \App\Http\Livewire\Detailpatient\Process::class)->name('detailpatient.process');
    Route::get('progres/pulang/{queue}', \App\Http\Livewire\Progres\Pulang::class)->name('progres.pulang');
    Route::post("/jasa", [\App\Http\Livewire\Jasa\Process::class, "store_harga"]);
    Route::get("/nota-obat", [TransactionController::class,'render']);
    Route::get('/obat/kirim-email',[kirimEmailController::class,'index']);
    Route::post("/diagnosis/import", [ImportDiagnosisController::class, "import"]);
    Route::post("/lab/import", [ImportLabController::class, "import"]);
    Route::post("/ruangan/import", [ImportRoomController::class, "import"]);
    Route::post("/obat/import", [ImportObatController::class, "import"]);
    Route::get('antrian/process/{queue}', \App\Http\Livewire\Queue\Process::class)->name('queue.process');
    Route::post("antrian/process/{queue}", [\App\Http\Livewire\Queue\Process::class, "save"]);
    Route::get('antrian/acn/{queue}', \App\Http\Livewire\Queue\Process1::class)->name('queue.process1');
    Route::post("antrian/acn/{queue}", [\App\Http\Livewire\Queue\Process1::class, "save"]);
    Route::get('dokumentasi/add-params-and-request/{doc}', AddParamAndRequest::class)->name('doc.add-param');
    Route::get('antri/obat', \App\Http\Livewire\Queue\Drug::class)->name('queue.drug');
    Route::get('antri/obat/process/{queue}', \App\Http\Livewire\Drug\Process::class)->name('queue.drug.process');
    Route::post('antri/obat/process/{queue}', [\App\Http\Livewire\Drug\Store::class, "store"]);
    Route::get('/keluargaberencana/buat/{familyPlanning}', \App\Http\Livewire\Familyplanning\Buat::class)->name('familyplanning.buat');
    Route::get('detailpemeriksaan/{familyplanning}', \App\Http\Livewire\Detailpemeriksaan\Process::class)->name('detailpemeriksaan.process');
    Route::get('/nota/{transaksi}/{transaksiIndex}/print', [\App\Http\Livewire\Nota\Single::class, 'print'])->name('nota.print');
    Route::get("/nota/download/{transaksi_id}", [\App\Http\Livewire\Nota\Single::class, "nota_inap"]);


    foreach ($list_menu as $key => $menu) {
        $name = ucfirst($key);
        $component = "App\\Http\\Livewire\\$name";
        Route::prefix($menu)->name("$key.")->group(function () use ($key, $component) {
            if (@class_exists("$component\\Index")) {
                Route::get('/', "$component\\Index")->name('index');
            }
            if (@class_exists("$component\\Create")) {
                Route::get('/create', "$component\\Create")->name('create');
            }
            if (@class_exists("$component\\Update")) {
                Route::get('/update/{' . $key . '}', "$component\\Update")->name('update');
            }
        });
    }
});
// Route::get('login', \App\Http\Livewire\Auth\Login::class, 'authenticate')->name('login');
Route::get('login', \App\Http\Livewire\Auth\Login::class)->name('login')->middleware('guest');
// Route::get('login', \App\Http\Livewire\Auth\Login::class)->name('login');
Route::group(['prefix' => 'select'], function () {
    Route::get('doctor', [SelectController::class, 'doctor'])->name('select.doctor');
    Route::get('service', [SelectController::class, 'service'])->name('select.service');
    Route::get('parameter', [SelectController::class, 'parameter'])->name('select.parameter');
    Route::get('response', [SelectController::class, 'response'])->name('select.response');
});

// Route::get('/greet', 'UserController@greet');
Route::post('logout', [UserController::class, 'logout'])->name('logout');

// Route generator
Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')
->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')
->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')
->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')
->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')
->name('io_generator_builder_rollback');
Route::post('generator_builder/generate-from-file','\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile')
->name('io_generator_builder_generate_from_file');

