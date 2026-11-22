<?php
//use
use App\Http\Controllers\AUTHcontroller;
use App\Models\Recruit;
use App\Http\Controllers\DEL_UPcontroller;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('DASHBOARD.superadmin');
});

Route::get('/loginUSER', function () {
    return view('AUTHENT.login');
});

Route::get('/registerUSER', function () {
    return view('AUTHENT.registration');
});


/////////// post request
Route::post('/loginUSER',[AUTHcontroller::class,'loginuser_funct']);
Route::post('/registerUSER',[AUTHcontroller::class, 'registeruser_funct']);
Route::post('/logoutUSER',[AUTHcontroller::class,'logoutuser_funct']);



///////////////////// *********************** 1. READ FROM THE DATABASE  **************************

// 1.introduce an associative array that will READ all table data
Route::get('/',function(){   

            $identityTV = [];
           $identityTV = Recruit::all();
         return view('DASHBOARD.superadmin' , [ 'identityTV' => $identityTV]);
 });


 //////////////////// *********************** 1. READ FROM THE DATABASE  ***********************
Route::delete('/delete/{DELETE_ID}',[DEL_UPcontroller::class,'user_delete']);

//////////////////// *********************** 1. edit FROM THE DATABASE  ***********************
 Route::GET('/showselected_edit/{GRABDATA_ID}',[DEL_UPcontroller::class,'show_selected_editfunct']); 
 Route::PUT('/showselected_updated/{GRABDATA_ID}', [DEL_UPcontroller::class,'show_selected_updatefunct']);


 ?>