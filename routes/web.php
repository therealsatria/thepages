<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;

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
    return view('default-form/welcome');
});

////////////////////////
Route::get('/pages',[PagesController::class,'index'])->name('pages')->middleware('auth');
Route::get('/tambahpages',[PagesController::class,'tambah'])->name('tambahpages')->middleware('auth');
Route::post('/insertpages',[PagesController::class,'insert'])->name('insertpages');
Route::get('/tampilkanpages/{id}',[PagesController::class,'tampilkan'])->name('tampilkanpages')->middleware('auth');
Route::post('/updatepages/{id}',[PagesController::class,'update'])->name('updatepages');
Route::get('/deletepages/{id}',[PagesController::class,'delete'])->name('deletepages')->middleware('auth');
Route::get('/pdfpages',[PagesController::class,'exportpdf'])->name('pdfpages');
////////////////////////



////////////////////////default-form////////////////////////
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/loginproses',[LoginController::class,'loginproses'])->name('loginproses');
Route::get('/register',[LoginController::class,'register'])->name('register')->middleware('auth');
Route::post('/registeruser',[LoginController::class,'registeruser'])->name('registeruser');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
////////////////////////default-form////////////////////////

// ujicoba
Route::get('/lte',[LoginController::class,'lte'])->name('test');




