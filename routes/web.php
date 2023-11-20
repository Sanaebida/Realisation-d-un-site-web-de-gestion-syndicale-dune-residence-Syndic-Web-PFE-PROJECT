<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormValidtionController;
use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\CarnetController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\MdpController;


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
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//to add new allowed users
Route::get('/form', [FormValidtionController::class, 'createUserForm'])->name('form');
Route::post('/form', [FormValidtionController::class, 'UserForm'])->name('validate.form');
//show allowed users
Route::get('/users', [FormValidtionController::class, 'show'])->name('users');
//edit and delete users
Route::get('/usersEdit{id}', [FormValidtionController::class, 'edit'])->name('users.edit');
Route::match(['put', 'patch'], '/users/update/{id}', 'App\Http\Controllers\FormValidtionController@update')->name('users.update');
Route::delete('/users/destroy/{id}', 'App\Http\Controllers\FormValidtionController@destroy')->name('users.destroy');
//carnet 
Route::get('/carnet', [CarnetController::class, 'index'])->name('carnet.index');
Route::get('/createcarnet', [CarnetController::class, 'create'])->name('carnet.create');
Route::post('/createcarnet', [CarnetController::class, 'store'])->name('carnet.store');
Route::get('/carnet{id}', [CarnetController::class, 'edit'])->name('carnet.edit');
Route::match(['put', 'patch'], '/carnet/update/{id}', 'App\Http\Controllers\CarnetController@update')->name('carnet.update');
Route::delete('/carnet/destroy/{id}', 'App\Http\Controllers\CarnetController@destroy')->name('carnet.destroy');
 //CHARTS
 Route::get('/charts', [ChartJSController::class, 'index'])->name('charts');
 //cotisation
 Route::get('/cotisation', [CotisationController::class, 'show'])->name('cotisation.index');
 Route::get('/create', [CotisationController::class, 'create'])->name('create');
 Route::post('/create', [CotisationController::class, 'store'])->name('Validate.create');
 Route::get('/cotisationEdit{id}', [CotisationController::class, 'edit'])->name('cotisation.edit');
 Route::match(['put', 'patch'], '/cotisation/update/{id}', 'App\Http\Controllers\CotisationController@update')->name('cotisation.update');
 Route::delete('/cotisation/destroy/{id}', 'App\Http\Controllers\CotisationController@destroy')->name('cotisation.destroy');
 //Reclamation
 Route::get('/reclamation', [ReclamationController::class, 'create'])->name('reclamation');
 Route::post('/reclamation', [ReclamationController::class, 'store'])->name('store.form');
 //password
 Route::get('/motdepass', [MdpController::class, 'index'])->name('mdp.index');
 Route::match(['put', 'patch'], '/mdp/update', 'App\Http\Controllers\MdpController@update')->name('mdp.update');



  


 



