<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;
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
    return redirect('/login');
});


// need auth first
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $tasks = DB::table('tasks')-> get();
    return view('dashboard',compact('tasks'));
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/users', function () {
    return view('users');
})->name('users');

Auth::routes();


