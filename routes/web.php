<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Session;
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


Route::get('/back', function () {
    return back();
});

Route::get('/logout', function () {
    Session::flush('user');
    return redirect('/login');
});
// test-------------------------------------------------
Route::view('/show', 'user.show');


//Login && Register && LogOut

Route::view('register', 'register')->middleware('login');

Route::view('login', 'login')->middleware('login');
Route::post("login/user", [UserController::class, 'login'])->name('loginToWeb');
Route::post("register/user", [UserController::class, 'register'])->name('user.register');

//Route For Search 

Route::post('/search', [UserController::class, 'search']);


//user
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/home/recipes', [UserController::class, 'showAll'])->name('home.recipes');
Route::get('/home/recipes/show/{id}', [UserController::class, 'show'])->name('recipes.show');

Route::post('/add_to_list', [CartController::class, 'addToList']);

//Admin

Route::prefix('admin')->middleware('isadmin')->group(function () {

    Route::get('/home', [AdminController::class, 'list']);

    Route::view('/form', 'admin.create')->name('create');
    Route::post('/store', [AdminController::class, 'store'])->name('store');

    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');

    Route::get('/edit-ingredient/{id}', [AdminController::class, 'edit_ingredient'])->name('edit.ingredient');
    Route::post('/update-ingredient', [AdminController::class, 'update_ingredient'])->name('update.ingredient');


    Route::get('/edit-step/{id}', [AdminController::class, 'edit_step'])->name('edit.step');
    Route::post('/update-step', [AdminController::class, 'update_step'])->name('update.step');

    Route::get('/home/delete/{id}', [AdminController::class, 'delete'])->name('delete');
});
