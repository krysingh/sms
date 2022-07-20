<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
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
    Route::get('/password/view',[ProfileController::class,'ChangePassword'])->name('password.change.view');
    Route::post('/password/store',[ProfileController::class,'UpdatePassword'])->name('password.upadte');
});

//Setup Management

Route::prefix('student')->group(function(){
    //Student Class
    Route::get('/view/class',[StudentClassController::class,'StudentClassView'])->name('student.class.view');
    Route::get('/add/class',[StudentClassController::class,'StudentClassAdd'])->name('student.class.add');
    Route::post('/store/class',[StudentClassController::class,'StudentClassStore'])->name('student.class.store');
    Route::get('/delete/class/{id}',[StudentClassController::class,'StudentClassdelete'])->name('student.class.delete');
    Route::get('/edit/class/{id}',[StudentClassController::class,'StudentClassEdit'])->name('student.class.edit');
    Route::post('/update/class/{id}',[StudentClassController::class,'StudentClassUpdate'])->name('student.class.update');

    //Student Year
    Route::get('/view/year',[StudentYearController::class,'StudentYearView'])->name('student.year.view');
    Route::get('/add/year',[StudentYearController::class,'StudentYearAdd'])->name('student.year.add');
    Route::post('/store/year',[StudentYearController::class,'StudentYearStore'])->name('student.year.store');
    Route::get('/delete/year/{id}',[StudentYearController::class,'StudentYeardelete'])->name('student.year.delete');
    Route::get('/edit/year/{id}',[StudentYearController::class,'StudentYearEdit'])->name('student.year.edit');
    Route::post('/update/year/{id}',[StudentYearController::class,'StudentYearUpdate'])->name('student.year.update');

    //Student Group
    Route::get('/view/group',[StudentGroupController::class,'StudentGroupView'])->name('student.group.view');
    Route::get('/add/group',[StudentGroupController::class,'StudentGroupAdd'])->name('student.group.add');
    Route::post('/store/group',[StudentGroupController::class,'StudentGroupStore'])->name('student.group.store');
    Route::get('/delete/group/{id}',[StudentGroupController::class,'StudentGroupdelete'])->name('student.group.delete');
    Route::get('/edit/group/{id}',[StudentGroupController::class,'StudentGroupEdit'])->name('student.group.edit');
    Route::post('/update/group/{id}',[StudentGroupController::class,'StudentGroupUpdate'])->name('student.group.update');

     //Student Shif
     Route::get('/view/shift',[StudentShiftController::class,'StudentShiftView'])->name('student.shift.view');
     Route::get('/add/shift',[StudentShiftController::class,'StudentShiftAdd'])->name('student.shift.add');
     Route::post('/store/shift',[StudentShiftController::class,'StudentShiftStore'])->name('student.shift.store');
     Route::get('/delete/shift/{id}',[StudentShiftController::class,'StudentGroupdelete'])->name('student.shift.delete');
     Route::get('/edit/shift/{id}',[StudentShiftController::class,'StudentShiftEdit'])->name('student.shift.edit');
     Route::post('/update/shift/{id}',[StudentShiftController::class,'StudentShiftUpdate'])->name('student.shift.update');

     //Fee Category
     Route::get('/view/cat',[FeeCategoryController::class,'FeeCatView'])->name('fee.cat.view');
     Route::get('/add/cat',[FeeCategoryController::class,'FeeCatAdd'])->name('fee.cat.add');
     Route::post('/store/cat',[FeeCategoryController::class,'FeeCatStore'])->name('fee.cat.store');
     Route::get('/delete/cat/{id}',[FeeCategoryController::class,'FeeCatDelete'])->name('fee.cat.delete');
     Route::get('/edit/cat/{id}',[FeeCategoryController::class,'FeeCatEdit'])->name('fee.cat.edit');
     Route::post('/update/cat/{id}',[FeeCategoryController::class,'FeeCatUpdate'])->name('fee.cat.update');

});