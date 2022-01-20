<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\DetailAssigmentController;
use App\Http\Controllers\DetailModuleController;
use App\Http\Controllers\ListModuleController;

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
Route::get('/category/get/',[CategoryController::class, 'getAllCategory']);
Route::post('/category/create/',[CategoryController::class, 'createCategory']);
Route::post('/category/update/{id}',[CategoryController::class, 'updateCategory']);
Route::delete('/category/delete/{id}',[CategoryController::class, 'deleteCategory']);

Route::get('/label/get/{id}',[LabelController::class, 'showLabel']);
Route::get('/label/get',[LabelController::class, 'getAllLabel']);
Route::post('/label/create',[LabelController::class, 'createLabel']);
Route::post('/label/update/{id}',[LabelController::class, 'updateLabel']);
Route::delete('/label/delete/{id}',[LabelController::class, 'deleteLabel']);

Route::get('/detailModule/get/{id}',[DetailModuleController::class, 'showDetailModule']);
Route::get('/detailModule/get/',[DetailModuleController::class, 'getDetailModule']);
Route::post('/detailModule/create/',[DetailModuleController::class, 'createDetailModule']);
Route::post('/detailModule/update/{id}',[DetailModuleController::class, 'updateDetailModule']);
Route::delete('/detailModule/delete/{id}',[DetailModuleController::class, 'deleteDetailModule']);

Route::get('/detailAssigment/get/{id}',[DetailAssigmentController::class, 'showDetailAssigment']);
Route::get('/detailAssigment/get/',[DetailAssigmentController::class, 'getAllAssigment']);
Route::post('/detailAssigment/create/',[DetailAssigmentController::class, 'createDetailAssigment']);
Route::post('/detailAssigment/update/{id}',[DetailAssigmentController::class, 'updateDetailAssigment']);
Route::delete('/detailAssigment/delete/{id}',[DetailAssigmentController::class, 'deleteDetailAssigment']);

Route::get('/ListModule/get/{id}',[ListModuleController::class, 'showListModule']);
Route::get('/ListModule/get/',[ListModuleController::class, 'getListModule']);
Route::post('/ListModule/create/',[ListModuleController::class, 'createListModule']);
Route::post('/ListModule/update/{id}',[ListModuleController::class, 'updateListModule']);
Route::delete('/ListModule/delete/{id}',[ListModuleController::class, 'deleteListModule']);

// Route::post('register', [UserController::class, 'registerUser']);
// Route::post('login', [UserController::class, 'loginUser']);
// Route::post('logout', [UserController::class, 'logoutUser']);
// Route::post('user/update/{id}', [UserController::class, 'updateUser']);
// Route::get('user/get/{id}', [UserController::class, 'getUser']);
