<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandsignController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ThanksimgController;
use App\Http\Controllers\Controller;
use App\Models\Handsign;

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

Route::resource('dashboard', MypageController::class);
Route::resource('video', VideoController::class);
Route::resource('handsign', HandsignController::class);
Route::resource('thanks_img', ThanksimgController::class);

Route::post(
    'handsign',
    [App\Http\Controllers\HandsignController::class, "upload"]
)->middleware(['auth'])->name("handsign");

Route::post(
    'thanks_img',
    [App\Http\Controllers\ThanksimgController::class, "upload"]
)->middleware(['auth'])->name("thanks_img");

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/dashboard',
    [App\Http\Controllers\MypageController::class, "index"]
)->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
