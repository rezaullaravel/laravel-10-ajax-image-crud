<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;



Route::get('/',[ItemController::class,'index']);
Route::post('/store/item',[ItemController::class,'storeItem']);
Route::get('/edit/item/{id}',[ItemController::class,'editItem']);
Route::post('/update/item/{id}',[ItemController::class,'updateItem']);
Route::get('/delete/item/{id}',[ItemController::class,'deleteItem']);
