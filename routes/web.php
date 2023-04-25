<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\ThanhvienController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\areaController;
use App\Http\Controllers\nvrController;
use App\Http\Controllers\cameraController;
use App\Http\Controllers\identifiedlistsController;
use App\Http\Controllers\apiController;
use App\Http\Controllers\mapController;

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

// Route::get('/login.html', function () {
//     return view('login');
// })->name('login');

Route::resource('thanhvien', ThanhvienController::class);
Route::resource('area', areaController::class);
Route::resource('nvr', nvrController::class);
Route::resource('camera', cameraController::class);
Route::resource('identifiedlists', identifiedlistsController::class);
Route::resource('map', mapController::class);

Route::get('/', function () {
   return view('page.index');
})->name('index')->middleware('auth');

Route::get('/ban-do-so.html', function () {
    return redirect()->route('map.index');
})->name('bandoso');
Route::get('/ban-do-so/add.html', function () {
    return redirect()->route('map.create');
})->name('thembandoso');

Route::prefix('he-thong-camera-ai')->name('hethongcam.')->group(function () {
    Route::get('/tat-ca-su-kien.html', function () {
        return view('page.tat_ca_su_kien');
    })->name('all');

    Route::get('/nha-dien-khuong-mat.html', function () {
        return view('page.nhan_dien_khuon_mat');
    })->name('nhandienkhuongmat');

    Route::get('/nhan-dien-bien-so.html', function () {
        return view('page.nhan_dien_bien_so');
    })->name('nhandienbienso');

    Route::get('/nhan-dien-dam-dong.html', function () {
        return view('page.nhan_dien_dam_dong');
    })->name('nhandiendamdong');

    Route::get('/danh-sach-nhan-dang.html', function () {
        return redirect()->route('identifiedlists.index');
    })->name('danhsachnhandang');
    
    Route::get('/danh-sach-nhan-dang/add.html', function () {
        return view('page.them_doi_tuong_nhan_dang');
    })->name('themdoituongnhandang');

    Route::get('/lich-su-nhan-dien-bien-so.html', function () {
        return view('page.lich_su_nhan_dien_bien_so');
    })->name('lichsunhandienbienso');

    Route::get('/lich-su-nhan-dien-khuon-mat.html', function () {
        return view('page.lich_su_nhan_dien_khuon_mat');
    })->name('lichsunhandienkhuonmat');

    Route::get('/phan-tich-video.html', function () {
        return view('page.phan_tich_video');
    })->name('phantichvideo');
    
    Route::get('/ket-qua-phan-tich-video.html', function () {
        return view('page.ket_qua_phan_tich_video');
    })->name('ketquaphantichvideo');

    Route::get('/phan-tich-video/add.html', function () {
        return view('page.them_video_phan_tich');
    })->name('themvideophantich');
});

Route::prefix('he-thong-cctv')->name('hethongcctv.')->group(function () {
    Route::get('/khu-vuc.html', function () {
        return redirect()->route('area.index');
    })->name('danhsachkhuvuc');


    Route::get('/danh-sach-khu-vuc/add.html', function () {
        return view('page.them_khu_vuc');
    })->name('themmoikhuvuc');

    Route::get('/danh-sach-nvr.html', function () {
        return redirect()->route('nvr.index');
    })->name('danhsachnvr');

    Route::get('/danh-sach-nvr/add.html', function () {
        return redirect()->route('nvr.create');
    })->name('themmoinvr');

    Route::get('/danh-sach-camera.html', function () {
        return redirect()->route('camera.index');
    })->name('danhsachcamera');

    Route::get('/danh-sach-camera/add.html', function () {
        return redirect()->route('camera.create');
    })->name('themmoicamera');


    Route::get('/xem-truc-tiep.html', function () {
        return view('page.xemn_truc_tiep');
    })->name('xemtructiep');

    Route::get('/{id}/xem-truc-tiep.html', function () {
        return view('page.xemn_truc_tiep_chi_tiet');
    })->name('xemtructiepchitiet');

});

Route::prefix('thanh-vien')->name('thanhvien.')->group(function () {
    Route::get('/danh-sach-thanh-vien.html', function () {
        //return view('page.danh_sach_thanh_vien');
        return redirect()->route('thanhvien.index');
    })->name('danhsachthanhvien');

    Route::get('/danh-sach-thanh-vien/add.html', function () {
        return view('page.them_thanh_vien');
    })->name('themmoithanhvien');
});

Route::get('profile.html', function () {
    return view('page.profile');
})->name('profile');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::prefix('api/he-thong-cctv')->name('api.')->group(function () {

    Route::get('/danh-sach-camera.html', [apiController::class,'camera']);
});