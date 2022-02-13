<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

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

Route::get('/gallery', [UploadController::class, 'displayAllImages'])->name('gallery.display');

Route::view('/upload', 'Create')->name('upload.create');

Route::post('/upload', [UploadController::class, 'createImage'])->name('upload.createImage');

Route::get('/update/{id}', [UploadController::class, 'updateImage'])->name('update.updateImage');

Route::post('/update', [UploadController::class, 'postUpdateImage'])->name('update.postUpdate');

Route::get('/delete/{id}', [UploadController::class, 'deleteImage'])->name('delete.deleteImage');

Route::post('/search', [UploadController::class, 'searchImage'])->name('search.searchImage');