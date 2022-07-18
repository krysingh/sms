<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
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

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
Route::get('logout', [AdminController::class, 'Logout'])->name('admin.logout');;

//User 
Route::prefix('user')->group(function(){
    Route::get('/view',[UserController::class,'UserView'])->name('user.view');
    Route::get('/add',[UserController::class,'UserAdd'])->name('user.add');
    Route::post('/store',[UserController::class,'UserStore'])->name('user.store');
    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('user.edit');
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('user.delete');
});

//Manage User Profile
Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class,'UserProfile'])->name('user.profile');
    Route::get('/edit',[ProfileController::class,'UserProfileEdit'])->name('user.profile.edit');
    Route::post('/store',[ProfileController::class,'UserProfileStore'])->name('user.profile.store');
    Route::get('/password',[ProfileController::class,'ChangePassword'])->name('user.password');

});