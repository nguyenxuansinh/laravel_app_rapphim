<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GheController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongchieuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuatchieuController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('user/login', [UserController::class, 'login'])->name('user.login');
Route::get('verify-account/{email}', [UserController::class, 'verify'])->name('user.verify');
Route::post('user/login_check', [UserController::class, 'checklogin'])->name('user.loginpost');

Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/user/create', [UserController::class,'store'])->name('user.create');

Route::get('/for_got', [UserController::class, 'for_got'])->name('user.for_got');
Route::post('/for_got_check', [UserController::class, 'for_got_check'])->name('user.for_got');
Route::get('change-account/{email}', [UserController::class, 'change_pass'])->name('user.change');
Route::post('/doimatkhau', [UserController::class, 'doimatkhau'])->name('user.doimatkhau');






Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('user/gioithieu', [UserController::class, 'user_gioithieu_view'])->name('user.gioithieu');
Route::get('user/search', [UserController::class, 'search'])->name('user.search');

Route::group(['middleware' => 'checklogin'], function () {
   Route::get('/nangcaphang', [UserController::class, 'nangcaphang'])->name('nangcaphang');
   Route::post('user/update_pass', [UserController::class,'update'])->name('user.update_pass');
   Route::post('user/update_info', [UserController::class,'update_info'])->name('user.update_info');
   Route::post('user/feedback', [FeedbackController::class,'feedback'])->name('user.feedback');

   Route::get('/thanhtoan', [UserController::class, 'thanhtoan'])->name('thanhtoan');
   Route::get('/thongtindadat', [UserController::class, 'thongtindadat'])->name('thongtindadat');
   Route::post('/guithongtindat_ve_email', [UserController::class,'guithongtindat_ve_email'])->name('guithongtindat_ve_email');
   

   Route::get('user/lichsu', [UserController::class, 'lichsu'])->name('user.lichsu');
   Route::post('user/xemchitiet', [UserController::class, 'xemchitiet'])->name('user.xemchitiet');
   

   Route::get('phimdangchieu/detail', [UserController::class, 'phimdangchieu_detail'])->name('phimdangchieu.detail');
   Route::get('phimsapchieu/detail', [UserController::class, 'phimsapchieu_detail'])->name('phimsapchieu.detail');
   Route::get('user/info', [UserController::class, 'user_info_view'])->name('user.info_view');
   Route::get('user/thanhvien', [UserController::class, 'thanhvien'])->name('user.thanhvien');


   
   Route::post('user/datve', [UserController::class, 'datve_index'])->name('datve.index');
   Route::post('user/kocosuatchieu', [UserController::class, 'kocosuatchieu'])->name('datve.kocosuatchieu');

   Route::post('user/datve/ngaychieu/{ngaychieu}', [UserController::class, 'datve_ngaychieu_giochieu'])->name('ngaychieu.giochieu');


   Route::post('user/datve/giochieu', [UserController::class, 'datve_suatchieu'])->name('datve.suatchieu');
   Route::post('user/datve/luu-gia-tri-so-luong', [UserController::class, 'luuGiaTriSoLuong'])->name('luu_gia_tri_so_luong');

   Route::post('user/datghe', [UserController::class, 'datghe_maghe'])->name('datghe.maghe');
   Route::post('/vnpay_payment', [UserController::class, 'vnpay_payment'])->name('vnpay_payment');
   Route::post('/momo_payment', [UserController::class, 'momo_payment'])->name('momo_payment');

   Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'checklogin'])->name('admin.loginpost');

Route::group(['middleware' => 'checklogin_admin'], function () {
   Route::get('admin/index', [AdminController::class, 'index'])->name('admin.index');
   Route::get('admin/hoadon/detail/{id}', [AdminController::class, 'hoadon_detail'])->name('hoadon.detail');
   Route::get('admin/hoadon/doanh-thu', [AdminController::class, 'doanh_thu'])->name('doanh-thu');
   
   Route::get('phim/index', [PhimController::class, 'index'])->name('phim.index');
   Route::get('admin/create_product', [AdminController::class, 'create_product'])->name('admin.create_product');
   Route::post('admin/insert_phim', [PhimController::class, 'insert_phim'])->name('admin.insert_phim');
   Route::get('phim/edit/{id}', [PhimController::class, 'edit'])->name('phim.edit');
   Route::post('phim/update/{id}', [PhimController::class, 'update'])->name('phim.update');
   Route::delete('phim/delete/{id}', [PhimController::class, 'delete'])->name('phim.delete');
   

   Route::get('phongchieu/index', [PhongchieuController::class, 'index'])->name('phongchieu.index');
   Route::get('admin/create_phongchieu', [AdminController::class, 'create_phongchieu'])->name('admin.create_phongchieu');
   Route::post('phongchieu/insert_phongchieu', [PhongchieuController::class, 'insert_phongchieu'])->name('admin.insert_phongchieu');
   Route::get('phongchieu/edit/{id}', [PhongchieuController::class, 'edit'])->name('phongchieu.edit');
   Route::post('phongchieu/update/{id}', [PhongchieuController::class, 'update'])->name('phongchieu.update');
   Route::delete('phongchieu/delete/{id}', [PhongchieuController::class, 'delete'])->name('phongchieu.delete');
   
   
   Route::get('ghe/index', [GheController::class, 'index'])->name('ghe.index');
   Route::get('admin/create_ghe', [AdminController::class, 'create_ghe'])->name('admin.create_ghe');
   Route::post('ghe/insert_ghe', [GheController::class, 'insert_ghe'])->name('ghe.insert_ghe');
   Route::get('ghe/edit/{id}', [GheController::class, 'edit'])->name('ghe.edit');
   Route::post('ghe/update/{id}', [GheController::class, 'update'])->name('ghe.update');
   Route::delete('ghe/delete/{id}', [GheController::class, 'delete'])->name('ghe.delete');


   Route::get('suatchieu/index', [SuatchieuController::class, 'index'])->name('suatchieu.index');
   Route::get('admin/create_suatchieu', [AdminController::class, 'create_suatchieu'])->name('admin.create_suatchieu');
   Route::post('suatchieu/insert_suatchieu', [SuatchieuController::class, 'insert_suatchieu'])->name('suatchieu.insert_suatchieu');
   Route::get('suatchieu/edit/{id}', [SuatchieuController::class, 'edit'])->name('suatchieu.edit');
   Route::post('suatchieu/update/{id}', [SuatchieuController::class, 'update'])->name('suatchieu.update');
   Route::delete('suatchieu/delete/{id}', [SuatchieuController::class, 'delete'])->name('suatchieu.delete');

   Route::get('banner/index', [BannerController::class, 'index'])->name('banner.index');
   Route::get('admin/create_banner', [AdminController::class, 'create_banner'])->name('admin.create_banner');
   Route::post('banner/insert_banner', [BannerController::class, 'insert_banner'])->name('banner.insert_banner');
   Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
   Route::post('banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');
   Route::delete('banner/delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');
  
   Route::get('feedback/index', [FeedbackController::class, 'admin_index'])->name('feedback.index');
   Route::get('feedback/edit/{id}', [FeedbackController::class, 'edit'])->name('feedback.edit');
   Route::post('feedback/update/{id}', [FeedbackController::class, 'update'])->name('feedback.update');
   Route::get('feedback/delete_all', [FeedbackController::class, 'delete_all'])->name('feedback.delete_all');
  
   Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

});