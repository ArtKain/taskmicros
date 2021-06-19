<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DiaryController;
use \App\Http\Controllers\TableController;
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

Route::redirect('/' , '/home');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/create' , [DiaryController::class, 'Create'])->name('create');
    Route::post('/create/submit' , [DiaryController::class, 'Submit'])->name('submit');

    Route::get('/home' , [TableController::class, 'Table'])->name('index');

    Route::get('/{id}/update' , [TableController::class, 'TabUpdate'])->name('table.update');
    Route::post('/{id}/update' , [TableController::class, 'TabUpdateSubmit'])->name('table.update.submit');
    Route::get('/{id}/delete' , [TableController::class, 'TabDelete'])->name('table.delete');

    Route::get('/create/type' , [DiaryController::class, 'CreateType'])->name('create.type');
    Route::post('/create/type/submit' , [DiaryController::class, 'CreateTypeSubmit'])->name('create.type.submit');
});

