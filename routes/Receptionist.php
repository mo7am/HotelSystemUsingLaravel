<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\anyUsersController;
use App\Http\Controllers\anyUsersAdvancedController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\SocialController;
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


/*

|"In previous releases of Laravel, the RouteServiceProvider contained a $namespace property. This property's value would automatically be prefixed onto controller route definitions and calls to the action helper / URL::action method. In Laravel 8.x, this property is null by default. This means that no automatic namespace prefixing will be done by Laravel." Laravel 8.x Docs - Release Notes

*/


Route::group(['prefix' => LaravelLocalization::setLocale(),'middelware' =>['localeSessionRedirect' , 'localizationRedirect' , 'localeViewPath'] ] , function() {

    route::get('availableRooms', [ReceptionistController::class, 'availableRooms'])->name('rooms');
    //route::get('Has-Many-Reverse', [ManagerController::class, 'hasManyReverseRelation'])->name('HasManyReverse');

    Route::get('/getRoomByType/{roomtype?}/{adult?}',[ReceptionistController::class,'SearchRooms']);

    Route::post('/booknow_forreceptionist',[ReceptionistController::class,'book_now_for_receptionist'])->name('BookNow_forReceptionist');

    Route::get('/searchguest/{key?}/{searchingValue?}',[ReceptionistController::class,'SearchGuest'])->name('SearchGuest');

    Route::get('/searchguest/{key?}/{searchingValue?}',[ReceptionistController::class,'SearchGuest'])->name('SearchGuest');

    Route::get('/checkavailability/{room_id?}',[ReceptionistController::class,'checkavailability'])->name('CheckAvailability');

    Route::post('/book_exist',[ReceptionistController::class,'book_now_for_exist'])->name('BookNow_forExist');

////////////////////////////End Relations Route//////////////////////////////////

});

