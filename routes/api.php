<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/category/get/{id}',[CategoryController::class, 'showCategory']);
Route::get('/category/get/}',[CategoryController::class, 'getAllCategory']);
Route::post('/category/create/',[CategoryController::class, 'createCategory']);
Route::post('/category/update/{id}',[CategoryController::class, 'updateCategory']);
Route::delete('/category/delete/{id}',[CategoryController::class, 'deleteCategory']);

Route::get('/detailAssigment/get/{id}',[DetailAssigmentController::class, 'showDetailAssigment']);
Route::get('/detailAssigment/get/}',[DetailAssigmentController::class, 'getAllCategory']);
Route::post('/detailAssigment/create/',[DetailAssigmentController::class, 'createDetailAssigment']);
Route::post('/detailAssigment/update/{id}',[DetailAssigmentController::class, 'updateDetailAssigment']);
Route::delete('/detailAssigment/delete/{id}',[DetailAssigmentController::class, 'deleteDetailAssigment']);

Route::post('register', [UserController::class, 'registerUser']);
Route::post('login', [UserController::class, 'loginUser']);
Route::post('logout', [UserController::class, 'logoutUser']);
Route::post('user/update/{id}', [UserController::class, 'updateUser']);
Route::get('user/get/{id}', [UserController::class, 'getUser']);
