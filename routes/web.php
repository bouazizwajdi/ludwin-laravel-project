<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\FoldersController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[LoginController::class,'showLoginForm'])->name('sign-in');

Auth::routes();

Route::get('/register',function(){
    return abort(404);
})->name('register');
Route::post('/register',function(){
    return abort(404);
});
 //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('layouts/loginp', [App\Http\Controllers\HomeController::class, 'index'])->name('loginp');



Route::middleware(['admin'])->group(function () {

    Route::post('users/getreport', [UsersController::class,'getreport'])->name('users.getreport');

    Route::resource('groups',GroupsController::class);
    Route::resource('excels',FilesController::class);
    Route::resource('folders',FoldersController::class);
    Route::resource('users',UsersController::class);
    Route::resource('reports',ReportsController::class);
});


Route::middleware(['auth'])->group(function () {

    Route::get('reports_list', [ReportsController::class,'listreports'])->name('reports.list');
    Route::get('reports/{report}', [ReportsController::class,'show'])->name('reports.show');
    Route::get('users/editprofil/{id}', [UsersController::class,'editprofil'])->name('users.editprofil');
    Route::put('users/updateprofil/{id}', [UsersController::class,'updateprofil'])->name('users.updateprofil');

});
Route::get('/changer-langue/{lang}',  [LangueController::class,'changerLangue'])->name('changer.langue');
