<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\MyAccountController;

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
    return view('auth/login');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/admin/userlist', [AdminController::class, 'userlist']);

Route::get('/admin/coinhistory', [AdminController::class, 'coinhistory'])->name('coinhistory');
Route::post('/admin/tambahdata/{data}', 'AdminController@tambahdata')->name('tambah.data');
Route::post('/admin/coinStore', [AdminController::class, 'coinStore'])->name('insert.data.store');
Route::post('/admin/rewardStore', [AdminController::class, 'rewardStore'])->name('tukar.hadiah.store');
Route::post('/admin/addData', [AdminController::class, 'addData'])->name('addData');
Route::post('/admin/addDataReward', [AdminController::class, 'addDataReward'])->name('addDataReward');
Route::get('/admin/rewardhistory', [AdminController::class, 'rewardhistory'])->name('rewardhistory');
// ----------------------------------------------------------------------------- //
// Route::get('/prizeshop/coinhistory', [AdminController::class, 'coinhistory'])->name('coinhistory');
// Route::post('/admin/tambahdata/{data}', 'AdminController@tambahdata')->name('tambah.data');
// Route::post('/admin/coinStore', [AdminController::class, 'coinStore'])->name('insert.data.store');
// Route::post('/admin/rewardStore', [AdminController::class, 'rewardStore'])->name('tukar.hadiah.store');
// Route::post('/admin/addData', [AdminController::class, 'addData'])->name('addData');
// Route::post('/admin/addDataReward', [AdminController::class, 'addDataReward'])->name('addDataReward');
// Route::get('/admin/rewardhistory', [AdminController::class, 'rewardhistory'])->name('rewardhistory');
//---------------------------------------------------------------------------//
Route::get('/member/coinhistory', [MemberController::class, 'coinhistory']);
Route::get('/member/rewardhistory', [MemberController::class, 'rewardhistory']);
Route::get('/member/myaccount', [MyAccountController::class, 'index'])->name('myaccount');
Route::get('/member/viewreward/{value}', [MemberController::class, 'viewreward'])->name('viewreward');

Route::post('/myaccount/verify-password', [MyAccountController::class, 'verifyPassword'])->name('myaccount.verify-password');
Route::get('/myaccount/update', [MyAccountController::class, 'update'])->name('myaccount.update');
Route::get('/myaccount/editaccount', [MyAccountController::class, 'editaccount'])->name('myaccount.editaccount');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/generate-qrcode', [QRCodeController::class, 'generateQRCode'])->name('generate.qrcode');

Auth::routes();
