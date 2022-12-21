<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // 1001 add

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

Auth::routes();

// 1001 update. add 2 middleware auth and user-role can find on kernel the path
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/home",[HomeController::class,'userHome'])->name('home');
});

// Editor Route
Route::middleware(['auth','user-role:editor'])->group(function()
{
    Route::get("/editor/home",[HomeController::class,'editorHome'])->name('home.editor');
});

// Admin Route
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[HomeController::class,'adminHome'])->name('home.admin');
    
});

Route::get('/newsletters', 'App\Http\Controllers\NewsletterController@index')->name('newsletters.index');
Route::get('newsletters/create', 'App\Http\Controllers\NewsletterController@create')->name('newsletters.create');
Route::get('newsletters/{newsletter}', 'App\Http\Controllers\NewsletterController@show')->name('newsletters.show');
Route::post('newsletters', 'App\Http\Controllers\NewsletterController@store')->name('newsletters.store');
Route::get('newsletters/{newsletter}/edit', 'App\Http\Controllers\NewsletterController@edit')->name('newsletters.edit');
Route::delete('newsletters/{newsletter}', 'App\Http\Controllers\NewsletterController@destroy')->name('newsletters.destroy');
Route::put('newsletters/{newsletter}', 'App\Http\Controllers\NewsletterController@update')->name('newsletters.update');
Route::patch('newsletters/{newsletter}', 'App\Http\Controllers\NewsletterController@update')->name('newsletters.update');
