<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController ;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\DocumentController;
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

Route::get('/', function () {return view('welcome');});


//Route::get('site/{etudiant}', [EtudiantController::class, 'show'])->name('site.show')->middleware('auth');

//Route::get('site-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('site.edit')->middleware('auth');
//Route::put('site-edit/{etudiant}', [EtudiantController::class, 'update'])->middleware('auth');
//Route::delete('site-destroy/{etudiant}', [EtudiantController::class, 'destroy'])->middleware('auth');


//Route::get('site-page', [EtudiantController::class, 'pages']);

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication'])->name('login.authentication');
Route::get('/registration', [CustomAuthController::class, 'create'])->name('user.registration')->middleware('auth');
Route::post('/registration-store', [CustomAuthController::class, 'store'])->name('user.store')->middleware('auth');

Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

Route::get('index', [BlogPostController::class, 'index'])->name('site.index')->middleware('auth');
Route::get('/createArticle', [BlogPostController::class, 'create'])->name('site.createArticle')->middleware('auth');
Route::post('/createArticle', [BlogPostController::class, 'store'])->name('site.store')->middleware('auth');
Route::delete('site/{blogPost}', [BlogPostController::class, 'destroy'])->name('site.destroy')->middleware('auth');
Route::get('site/{blogPost}', [BlogPostController::class, 'show'])->name('site.show')->middleware('auth');
Route::get('site-edit/{blogPost}', [BlogPostController::class, 'edit'])->name('site.edit')->middleware('auth');
Route::put('site-edit/{blogPost}', [BlogPostController::class, 'update'])->middleware('auth');

Route::get('listeDocs', [DocumentController::class, 'listeDocs'])->name('site.listeDocs')->middleware('auth');
Route::get('createDoc', [DocumentController::class, 'create'])->name('site.createDoc')->middleware('auth');
Route::post('createDoc', [DocumentController::class, 'store'])->name('site.storeDoc')->middleware('auth');
Route::get('site-voirDoc/{document}', [DocumentController::class, 'show'])->name('site.voirdoc')->middleware('auth');
Route::delete('site-doc/{document}', [DocumentController::class, 'destroy'])->name('site.destroydoc')->middleware('auth');