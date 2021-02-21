<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\anyUsersController;
use App\Http\Controllers\anyUsersAdvancedController;
use App\Http\Controllers\ManagerController;
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

//define('PAGINATION_COUNT' , 15);

Route::group(['prefix' => LaravelLocalization::setLocale(),'middelware' =>['localeSessionRedirect' , 'localizationRedirect' , 'localeViewPath'] ] , function() {





        Route::get('/indexAnyUserAdvanced', [anyUsersAdvancedController::class, 'indexAnyUserAdvanced'])->name('indexAnyUserAdvanced');
        Route::get('/indexReceptionist', [anyUsersAdvancedController::class, 'indexReceptionist'])->name('indexReceptionist');


        Route::get('/crudStaff', [ManagerController::class, 'CrudForManager'])->name('crudStaff');
        Route::get('/getEditionByManager', [ManagerController::class, 'geteditUserByManager'])->name('getEditionByManager');
        Route::get('/ViewAllUsers', [ManagerController::class, 'ViewAllUsers'])->name('ViewAllUsers');

        Route::post('registerByManager', [ManagerController::class, 'insertNewUserByManager'])->name('registerByManager');
        Route::post('/edititionByManager', [ManagerController::class, 'editUserByManager'])->name('edititionByManager');
        Route::post('/deletionByManager', [ManagerController::class, 'deleteUserByManager'])->name('deletionByManager');

        Route::get('/getUsersById/{id}',[ManagerController::class,'SearchUsers'])->name('getUsersById');

        Route::get('/getUsersByLikeStatement/{stringValue}',[ManagerController::class,'SearchUsersByLikeStatement'])->name('getUsersByLikeStatement');


        Route::get('/blankpage', [ManagerController::class, 'blankPage'])->name('blankpage');






Route::namespace('Staff')->group(function(){

    //all route only access controller or methods in folder name Staff
    //meaning
    //Folder Staff Contains Manager Controller and Receptionist Controller
    //means namespace access only this two controller
   // Route::get('/crudStaff', [ManagerController::class, 'CrudForManager']);
   // Route::get('/crudUsers', [ReceptionistController::class, 'CrudForReceptionist']);

});


Route::prefix('user')->group(function(){

   //instead of write this
    //Route::get('user/crudStaff', [ManagerController::class, 'CrudForManager']);
       // Route::get('user/crudUsers', [ReceptionistController::class, 'CrudForReceptionist']);
    //make prefix named user and write this
    //Route::get('crudStaff', [ManagerController::class, 'CrudForManager']);
    // Route::get('crudUsers', [ReceptionistController::class, 'CrudForReceptionist']);


});


//another shape
Route::group(['perfix' => 'user' , 'namespace'=>'Staff'] , function(){


});





////////////////////////////Begin Relations Route///////////////////////////////
///
/// ////////////////////////// One To One////////////////////////////////////

    route::get('Has-One', [ManagerController::class, 'hasOneRelation'])->name('HasOne');
    route::get('Has-One-Reverse', [ManagerController::class, 'hasOneReverseRelation'])->name('HasOneReverse');
    route::get('Get-Staff-Has-Phone', [ManagerController::class, 'hasOne_WhereHas_Relation'])->name('GetStaffHasPhone');
    route::get('Get-Staff-Not-Has-Phone', [ManagerController::class, 'hasOne_WhereDoesNotHave_Relation'])->name('GetStaffNotHasPhone');
    route::get('Get-Staff-Has-Phone-With-Condition', [ManagerController::class, 'hasOne_WhereHas_WithCondition_Relation'])->name('GetStaffHasPhoneWithCondition');

////////////////////////////////One To Many///////////////////////////////////////

    route::get('Specialist-Has-Many-Staff', [ManagerController::class, 'hasMany'])->name('SpecialistHasManyStaff');
    route::get('Has-Many-Reverse', [ManagerController::class, 'hasManyReverseRelation'])->name('HasManyReverse');


////////////////////////////End Relations Route//////////////////////////////////





    route::get('/roomtype', [ManagerController::class, 'index'])->name('RoomType');
    route::get('create', [ManagerController::class, 'create'])->name('Create');
    route::post('/store', [ManagerController::class, 'store'])->name('Manager.TypeRoom.Store');
    route::get('edit/{id}', [ManagerController::class, 'edit'])->name('Manager.TypeRoom.Edit');
    route::post('update', [ManagerController::class, 'update'])->name('Manager.TypeRoom.Update');
    route::get('delete/{id}', [ManagerController::class, 'delete'])->name('Manager.TypeRoom.Delete');






    route::get('/room', [ManagerController::class, 'indexRoom'])->name('Manager.Room.Room');
    route::get('Room/create', [ManagerController::class, 'createRoom'])->name('Manager.Room.Create');
    route::post('Room/store', [ManagerController::class, 'storeRoom'])->name('Manager.Room.Store');
    route::get('Room/edit/{id}', [ManagerController::class, 'editRoom'])->name('Manager.Room.Edit');
    route::post('Room/update', [ManagerController::class, 'updateRoom'])->name('Manager.Room.Update');
    route::post('Room/delete', [ManagerController::class, 'deleteRoom'])->name('Manager.Room.Delete');
    route::post('Room/activation', [ManagerController::class, 'activationRoom'])->name('Manager.Room.Activation');
    route::get('Room/getLanguage/{id}', [ManagerController::class, 'getLanguage'])->name('Manager.Room.GetLanguage');
    route::post('Room/StoreLanguage', [ManagerController::class, 'storeLanguage'])->name('Manager.Room.StoreLanguage');


});

