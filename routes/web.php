<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandsignController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ThanksimgController;

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

Route::resource('video', VideoController::class);

Route::resource('thanks_img', ThanksimgController::class);

Route::post(
    'thanks_img',
    [App\Http\Controllers\ThanksimgController::class, "upload"]
)->middleware(['auth'])->name("thanks_img");

// Route::get(
//     'thanks_img',
//     [App\Http\Controllers\ThanksimgController::class, "show"]
// )->middleware(['auth'])->name("thanks_img_index");

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
