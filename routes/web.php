<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();


// Route::get('/login', function () {
//     return view('login');
// });
// Route::middleware(['PreventBackHistory'])->group(function(){
    
    // Route::middleware(['auth:admins'])->group(function(){
        Route::get('/', function () {
            return view('home');
        });
        Route::match(['GET', 'POST'], '/logout', 'Auth\LoginController@logout');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/create-form', [App\Http\Controllers\HomeController::class, 'createForm'])->name('createForm');
        Route::get('/edit-form/{code}', [App\Http\Controllers\HomeController::class, 'editForm'])->name('editForm');
        Route::get('/question/{code}', [App\Http\Controllers\HomeController::class, 'getQuestion'])->name('getQuestion');
        Route::get('/getQuestionContent/{code}', [App\Http\Controllers\HomeController::class, 'getQuestionContent'])->name('getQuestionContent');
        Route::get('/getFormAnswered', [App\Http\Controllers\HomeController::class, 'getFormAnswered'])->name('getFormAnswered');
        Route::post('/saveForm', [App\Http\Controllers\HomeController::class, 'saveForm'])->name('saveForm');
        Route::post('/saveAnsweredForm', [App\Http\Controllers\HomeController::class, 'saveAnsweredForm'])->name('saveAnsweredForm');
        Route::get('/getSavedForm/{code}', [App\Http\Controllers\HomeController::class, 'getSavedForm'])->name('getSavedForm');
    // });
// });
