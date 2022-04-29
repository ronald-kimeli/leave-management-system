<?php

use App\Http\Controllers\API\ApplyleaveController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Public Routes User
Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);

//Protected Routes
Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () 
{
    //User Route
Route::post('logout',[AuthController::class,'logout']);
// Applyleave Routes
Route::get('leaves',[ApplyleaveController::class,'index']);
Route::post('leave/apply',[ApplyleaveController::class,'store']);
Route::get('leave/{id}/show',[ApplyleaveController::class,'show']);
//Product Routes  
Route::get('products',[ProductController::class,'index']);
Route::get('product/{id}/show',[ProductController::class,'show']);
Route::put('product/{id}/update',[ProductController::class,'update']);
Route::post('product/add',[ ProductController::class, 'store']);
Route::delete('product/{id}/delete',[ ProductController::class, 'destroy']);
});





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//  Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
//      });
