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

/// User Route
Route::middleware(['auth','user-role:user'])->group(function()
{
    // User Homepage Route
    Route::get("/home",[HomeController::class,'userHome'])->name('home');

    // User Newsletter Route
    Route::get('/home/newsletters', 'App\Http\Controllers\NewsletterController@userindex')->name('newsletters.userindex');

    // Admin View Specific Newsletter Route
    Route::get('/home/newsletters/{newsletter}'       , 'App\Http\Controllers\NewsletterController@usershow')     ->name('newsletters.usershow');
}); 

// Editor Route
Route::middleware(['auth','user-role:editor'])->group(function()
{
    Route::get("/editor/home",[HomeController::class,'editorHome'])->name('home.editor');
});

// Admin Route
Route::middleware(['auth','user-role:admin'])->group(function()
{
    // Admin Homepage Route
    Route::get("/admin/home",[HomeController::class,'adminHome'])->name('home.admin'); 

    // Admin Newsletters Route
    Route::get('/admin/home/newsletters', 'App\Http\Controllers\NewsletterController@adminindex')->name('newsletters.adminindex');

    // Admin Create Newsletter Route
    Route::get('/admin/home/newsletters/create'             , 'App\Http\Controllers\NewsletterController@create')   ->name('newsletters.create');

    // Admin Store Newsletter Route
    Route::post('/admin/home/newsletters'                   , 'App\Http\Controllers\NewsletterController@store')    ->name('newsletters.store');

    // Admin Restore Specific Newsletter Route
    Route::get('/admin/home/newsletters/restore'             , 'App\Http\Controllers\NewsletterController@restoreView')   ->name('newsletters.restoreView');

    // Admin View Specific Newsletter Route
    Route::get('/admin/home/newsletters/{newsletter}'       , 'App\Http\Controllers\NewsletterController@adminshow')     ->name('newsletters.adminshow');

    // Admin Edit Specific Newsletter Route
    Route::get('/admin/home/newsletters/{newsletter}/edit'  , 'App\Http\Controllers\NewsletterController@edit')     ->name('newsletters.edit');

    // Admin Destroy Specific Newsletter Route
    Route::delete('/admin/home/newsletters/{newsletter}'    , 'App\Http\Controllers\NewsletterController@destroy')  ->name('newsletters.destroy');
    
    // Admin Update Specific Newsletter Route
    Route::put('/admin/home/newsletters/{newsletter}'       , 'App\Http\Controllers\NewsletterController@update')   ->name('newsletters.update');
    Route::patch('/admin/home/newsletters/{newsletter}'     , 'App\Http\Controllers\NewsletterController@update')   ->name('newsletters.update');  
});



