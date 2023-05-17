<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BandosoController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\IdentifiedsController;
use App\Http\Controllers\NvrController;
use App\Http\Controllers\Profiletroller;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ThanhvienController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Auth::routes(['register' => false,],['throttle' => 5]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'check_user_status']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);

    Route::get('/', function () {
        return view('page.index');
    })->name('index');
    Route::get('ban-do-so', [BandosoController::class, 'index'])->name('bandoso'); 
         
     Route::prefix('xem-truc-tiep')->name('xemtructiep.')->group(function () {
        
        Route::get('/', [BandosoController::class, 'xem_truc_tiep'])->name('all'); 
     
        Route::get('/{id}', [BandosoController::class, 'xem_chi_tiet'])->where('id', '[0-9]+')->name('chitiet'); 
     
    });

    Route::prefix('identified')->name('identified.')->group(function(){
        Route::get('/all', [IdentifiedsController::class, 'all'])->name('all');
        Route::get('/all/{id}', [IdentifiedsController::class, 'all_cate'])->where('id', '[0-9]+')->name('all_cate');
    });

    Route::resource('identified', IdentifiedsController::class);

    Route::resource('video', VideoController::class);

    Route::resource('nvr', NvrController::class);

    Route::resource('camera', CameraController::class);

    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('/', [Profiletroller::class, 'index'])->name('index');
        Route::post('/', [Profiletroller::class, 'UpdateData'])->name('update');
    });

    Route::resource('thanh-vien', ThanhvienController::class);

    Route::post('ajax', [AjaxController::class, 'index'])->name('ajax');

    Route::get('ajax_nhandien', [AjaxController::class, 'get_track_his'])->name('ajaxtrack');

    Route::get('ajax_nhandien2', [AjaxController::class, 'get_track_his_2'])->name('ajaxtrack2');

    Route::get('track', [TrackController::class, 'index'])->name('track');
});








