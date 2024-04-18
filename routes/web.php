<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GerantController;
use App\Http\Controllers\MenuController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('gerant/new-pswd', [App\Http\Controllers\Auth\RegisteredUserController::class, 'newPswd'])->name('gerant.newPswd');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');

// Route::group(['middleware' => 'prevent-back-history'],function(){
// 	Auth::routes();
// 	Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
// });

Route::get('/dashboard', function () {
    return view('resto.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('category/edit/status/{id}', [App\Http\Controllers\CategoryController::class, 'editStatus'])->name('category.edit.status');
Route::post('product/edit/status/{id}', [App\Http\Controllers\ProductController::class, 'editStatus'])->name('product.edit.status');

Route::resource('resto', RestoController::class)->middleware(['auth']);
Route::resource('category', CategoryController::class)->middleware(['auth']);
Route::resource('product', ProductController::class)->middleware(['auth']);
Route::resource('gerant', GerantController::class)->middleware(['auth']);

Route::get('menu/menu1', [App\Http\Controllers\MenuController::class, 'menu1'])->name('menu.menu1');
Route::get('menu/menu1/view', [App\Http\Controllers\MenuController::class, 'menu1View'])->name('menu.menu1.view');
Route::get('menu/edit/menu1', [App\Http\Controllers\MenuController::class, 'editMenu1'])->name('menu.edit.menu1');
Route::get('menu/edit/menu2', [App\Http\Controllers\MenuController::class, 'editMenu2'])->name('menu.edit.menu2');
// Route::get('menu/menu2', [App\Http\Controllers\MenuController::class, 'menu2'])->name('menu.menu2');

Route::get('menu/menu2', [App\Http\Controllers\MenuController::class, 'menu2'])->name('menu.menu2');
Route::get('menu/menu2/final', [App\Http\Controllers\MenuController::class, 'menu2Final'])->name('menu.menu2.final');
Route::get('menu/menu1/final', [App\Http\Controllers\MenuController::class, 'menu1Final'])->name('menu.menu1.final');
Route::post('menu/prod', [App\Http\Controllers\MenuController::class, 'getProd'])->name('menu.prod');
Route::post('menu/resto', [App\Http\Controllers\MenuController::class, 'getRestoInfo'])->name('menu.resto');
Route::post('menu/menu1/store', [App\Http\Controllers\MenuController::class, 'menu1Store'])->name('menu.menu1.store');
Route::post('menu/menu2/store', [App\Http\Controllers\MenuController::class, 'menu2Store'])->name('menu.menu2.store');

//MENU 3
Route::get('menu/menu3', [App\Http\Controllers\MenuController::class, 'menu3'])->name('menu.menu3');
Route::get('menu/edit/menu3', [App\Http\Controllers\MenuController::class, 'editMenu3'])->name('menu.edit.menu3');
Route::post('menu/menu3/store', [App\Http\Controllers\MenuController::class, 'menu3Store'])->name('menu.menu3.store');
Route::get('menu/menu3/final', [App\Http\Controllers\MenuController::class, 'menu3Final'])->name('menu.menu3.final');


//MENU 4
Route::get('menu/menu4', [App\Http\Controllers\MenuController::class, 'menu4'])->name('menu.menu4');
Route::get('menu/edit/menu4', [App\Http\Controllers\MenuController::class, 'editMenu4'])->name('menu.edit.menu4');
Route::post('menu/menu4/store', [App\Http\Controllers\MenuController::class, 'menu4Store'])->name('menu.menu4.store');
Route::get('menu/menu4/final', [App\Http\Controllers\MenuController::class, 'menu4Final'])->name('menu.menu4.final');



Route::resource('menu', MenuController::class)->middleware(['auth']);



require __DIR__.'/auth.php';
