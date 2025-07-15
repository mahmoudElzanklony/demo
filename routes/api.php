<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductControllerResourceApi;
use App\Http\Controllers\CategoriesControllerResource;
use App\Http\Controllers\OrdersControllerResource;
use App\Http\Controllers\LoginControllerInvokable;
use App\Http\Controllers\CheckoutControllerInvokable;
use App\Http\Controllers\AppointmentsControllerResourceApi;
use App\Enums\OrderEnum;
use App\Models\User;
/*
 * comment
 * 2
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'/auth'],function(){
    Route::post('/login',LoginControllerInvokable::class);
});
Route::group(['prefix'=>'/checkout'],function(){
    Route::post('/',CheckoutControllerInvokable::class);
});

Route::get('/get-info',[AppointmentsControllerResourceApi::class,'get_info']);

Route::resources([
    'products'=>ProductControllerResourceApi::class,
    'categories'=>CategoriesControllerResource::class,
    'orders'=>OrdersControllerResource::class,
    'appointments'=>AppointmentsControllerResourceApi::class
]);
