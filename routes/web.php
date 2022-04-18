    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
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

Route::get('/', function () {
    return view('home');
});
if (Auth::user() == null) {
    // Route Sekolah
    Route::get('/sekolah',[SekolahController::class,'index'])->middleware('checkRole:admin');;
    Route::get('/sekolah/show',[SekolahController::class,'showAll'])->middleware('checkRole:admin');;
    Route::get('/sekolah/edit/{id}',[SekolahController::class,'show'])->middleware('checkRole:admin');;
    Route::put('/sekolah/update/{id}',[SekolahController::class,'edit'])->middleware('checkRole:admin');;
    Route::delete('/sekolah/delete/{id}',[SekolahController::class,'destroy'])->middleware('checkRole:admin');;
    Route::post('/sekolah',[SekolahController::class,'store'])->middleware('checkRole:admin');;
    // Route Siswa
    Route::get('/siswa',[SiswaController::class,'index'])->middleware('checkRole:admin');;
    Route::get('/siswa/show',[SiswaController::class,'showAll'])->middleware('checkRole:admin');;
    Route::get('/siswa/edit/{id}',[SiswaController::class,'show'])->middleware('checkRole:admin');;
    Route::put('/siswa/update/{id}',[SiswaController::class,'edit'])->middleware('checkRole:admin');;
    Route::delete('/siswa/delete/{id}',[SiswaController::class,'destroy'])->middleware('checkRole:admin');;
    Route::post('/siswa',[SiswaController::class,'store'])->middleware('checkRole:admin');;
}
if(\Auth::user()){

    Route::get('admin', function () { return view('admin'); })->middleware('checkRole:admin');
    Route::get('data', function () { return view('data-siswa'); })->middleware(['checkRole:siswa,admin']);
}



// Route::get('/',[App\Http\Controllers\SekolahController::class,'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


