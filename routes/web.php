<?php

use Illuminate\Support\Facades\Route;

//password'KamalSayed'
//A123456
//Saeed
//S123456
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

Route::get('/',function () {
    return view('home');
});

Route::get('/taqreshamain', function () {
    return view('showTaqresha');
});


Route::get('/showpc', [App\Http\Controllers\ShowTable::class, 'index'])->name('showpc');
Route::get('/showpc/fetch_data', [App\Http\Controllers\ShowTable::class ,'fetch_data']);
Route::post('/showpc/add_data', [App\Http\Controllers\ShowTable::class ,'add_data']);
Route::post('/showpc/update_data', [App\Http\Controllers\ShowTable::class ,'update_data']);
Route::post('/showpc/delete_data', [App\Http\Controllers\ShowTable::class ,'delete_data']);

// pc ext
Route::get('/showext', [App\Http\Controllers\PcExt::class, 'index'])->name('showext');
Route::get('/showext/fetch_data', [App\Http\Controllers\PcExt::class ,'fetch_data']);
Route::post('/showext/add_data', [App\Http\Controllers\PcExt::class ,'add_data']);
Route::post('/showext/update_data', [App\Http\Controllers\PcExt::class ,'update_data']);
Route::post('/showext/delete_data', [App\Http\Controllers\PcExt::class ,'delete_data']);


Route::get('/showcolored', [App\Http\Controllers\ColoredPrinter::class, 'index'])->name('showcolored');
Route::get('/showcolored/fetch_data', [App\Http\Controllers\ColoredPrinter::class ,'fetch_data']);
Route::post('/showcolored/add_data', [App\Http\Controllers\ColoredPrinter::class ,'add_data']);
Route::post('/showcolored/update_data', [App\Http\Controllers\ColoredPrinter::class ,'update_data']);
Route::post('/showcolored/delete_data', [App\Http\Controllers\ColoredPrinter::class ,'delete_data']);

Route::get('/showprinter', [App\Http\Controllers\Printer::class, 'index'])->name('showprinter');
Route::get('/showprinter/fetch_data', [App\Http\Controllers\Printer::class ,'fetch_data']);
Route::post('/showprinter/add_data', [App\Http\Controllers\Printer::class ,'add_data']);
Route::post('/showprinter/update_data', [App\Http\Controllers\Printer::class ,'update_data']);
Route::post('/showprinter/delete_data', [App\Http\Controllers\Printer::class ,'delete_data']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Auth::routes(); */

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
