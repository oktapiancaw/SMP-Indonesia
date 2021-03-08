<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



// route di bawah ini hanya boleh di akses ketika sudah login saja
Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    

    Route::middleware(['is_guru'])->group(function () {
        Route::get('/admin/home', 'HomeController@admin')->name('admin.home');
    });

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'],function(){
        // namespace itu untuk controller, lalu prefix itu urlnya
        // jadi resource nilai ini sama dengan
        // Route::resource('admin/nilai', 'Admin\NilaiController');

        Route::resource('nilai', 'NilaiController');

        
        // route di bawah ini hanya boleh di akses oleh guru
        // settingnya ada di app/Http/Middleware/IsGuru
        Route::middleware(['is_guru'])->group(function () {
            Route::resource('guru', 'GuruController');
            Route::resource('kelas', 'KelasController')->parameters(['kelas' => 'kelas']);
            Route::resource('mapel', 'MapelController');
            Route::resource('siswa', 'SiswaController');
        });
    });
});