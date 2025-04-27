<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
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

Route::get('/', function () {

    $query = \App\Models\User::query();
    $first = $query->clone()->whereNull('email_verified_at')->get();
    $second = $query->clone()->where('email','LIKE','%example.net%')->get();
    return $second;
    foreach ($data as $user){
        echo $user->name.'  and posts count ==>'.$user->posts_count .'<br>';
    }
    return view('welcome');
});

Route::controller(\App\Http\Controllers\HomeController::class)->group(function (){
   Route::get('/about','about');
});

Route::get('/abc',[\App\Http\Controllers\HomeController::class,'test']);
Route::get('/home',[\App\Http\Controllers\HomeController::class,'home']);
Route::get('/payment',[PaymentController::class,'index']);




