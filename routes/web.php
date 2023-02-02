<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
Route::get('allpost',[PostController::class, 'index'])->name(name:'posts.allpost');
Route::get('allpost/create',[postController::class,'create'])->name(name:'posts.create');
Route::get('allpost/update',[postController::class,'update'] )->name(name:'posts.update');
Route::get('allpost/{post}',[postController::class,'show'])->name(name:'posts.show');
Route::delete('allpost/{post}/',[postController::class,'destroy'])->name(name:'posts.destory');
Route::post('/allpost', [postController::class,'store'])->name(name:'posts.store');
