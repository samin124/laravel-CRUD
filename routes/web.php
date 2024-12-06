<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Check;

Route::view('/','welcome');
Route::post('/insert',[UserController::class,'insertData']);
Route::get('/all',[UserController::class,'getData'])->name('all');
Route::get('/update/{id}',[UserController::class,'updatePage'])->name('updateUser');
Route::post('/update2/{id1}',[UserController::class,'updateUser'])->name('update2');
Route::get('/delete/{id2}',[userController::class,'deleteUser'])->name('deleteUser');

?>