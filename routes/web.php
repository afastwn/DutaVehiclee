<?php

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

Route::group(['middleware'=>['guest']],function(){
    Route::get("/","ControlVehicle@login")->name('login');
    Route::post("/login","AuthController@cekLogin");
});

Route::group(['middleware'=>['auth']],function(){
    Route::get("/user","ControlVehicle@FormUser");
    Route::post("/updateuser","ControlVehicle@updateUser");
    Route::get("/logout","AuthController@cekLogout");
    Route::get("/home","ControlVehicle@home");
    Route::get("/vehicle","ControlVehicle@vehicle");
    Route::get("/vehicle/add-form","ControlVehicle@FormAddVehicle");
    Route::post("/save","ControlVehicle@save");
    Route::get("/vehicle/form-edit/{id}","ControlVehicle@FormEditVehicle");
    Route::put("/update/{id}","ControlVehicle@updateVehicle");
    Route::get("/delete/{id}", "ControlVehicle@deleteVehicle");
});