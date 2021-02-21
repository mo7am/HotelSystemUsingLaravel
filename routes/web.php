
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\anyUsersController;
use App\Http\Controllers\anyUsersAdvancedController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\SocialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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

Route::group(['prefix' => LaravelLocalization::setLocale(),'middelware' =>['localeSessionRedirect' , 'localizationRedirect' , 'localeViewPath'] ] , function() {



Route::get('/', function () {
    return view('homePageHotel.PagesHomePageHotel.index');
});

//Route::get('/test', 'TestController@index')->name('test');
Route::get('/test', [TestController::class, 'index'])->name('test');



Route::get('/redirect/{service}', [SocialController::class, 'redirect']);
Route::get('/callback/{service}', [SocialController::class, 'callback']);


Route::get('/index', [homePageController::class, 'index'])->name('indexhome');
// or
//Route::get('/index', 'App\Http\Controllers\homePageController@index');
Route::get('/about', [homePageController::class, 'about'])->name('About');
Route::get('/blog_single', [homePageController::class, 'blog_single'])->name('Blog_single');
Route::get('/blog', [homePageController::class, 'blog'])->name('Blog');
Route::get('/contact', [homePageController::class, 'contact'])->name('Contact');
Route::get('/restaurant', [homePageController::class, 'restaurant'])->name('Restaurant');
Route::get('/rooms_single', [homePageController::class, 'rooms_single'])->name('Rooms_single');
Route::get('/rooms', [homePageController::class, 'rooms'])->name('Rooms');
Route::get('/signup', [homePageController::class, 'signup'])->name('Signup');
Route::get('/showmorerooms/{skip?}', [homePageController::class, 'showmore'])->name('ShowMore');

    Route::get('/getAvailableRoom',[homePageController::class,'SearchAvailableRooms'])->name('SearchAvailableRooms');

    Route::get('/checkavailabilityroom/{room_id?}',[homePageController::class,'check_availability_room'])->name('CheckAvailabilityRoom');


Route::get('/indexAnyUser', [anyUsersController::class, 'indexAnyUser']);
Route::get('/aboutAnyUser', [anyUsersController::class, 'aboutAnyUser']);
Route::get('/availableRooms', [anyUsersController::class, 'availableRooms']);
Route::get('/blogAnyUser', [anyUsersController::class, 'blogAnyUser']);
Route::get('/contactAnyUser', [anyUsersController::class, 'contactAnyUser']);

Route::get('/work', [anyUsersController::class, 'work']);
Route::get('/services', [anyUsersController::class, 'services']);


Route::group(['middleware' => 'guest'], function () {

    Route::get('manuallogin', [LoginPageController::class, 'login_get'])->name('manuallogin');
    Route::post('manuallogin', [LoginPageController::class, 'login_post']);
    Route::post('manualregist', [LoginPageController::class, 'insertNewUser']);

});


Route::get('/getAllRooms', [anyUsersController::class, 'getAllRooms']);

Route::group(['middleware' => 'indexanyusers'], function () {

    Route::get('/CrudUsers', [anyUsersController::class, 'CrudUsers']);
    Route::get('/getEditByManager', [anyUsersController::class, 'geteditUserByManager']);
    Route::get('/ViewAllUsers', [anyUsersController::class, 'ViewAllUsers']);

    Route::post('registByManager', [anyUsersController::class, 'insertNewUserByManager']);
    Route::post('/editByManager', [anyUsersController::class, 'editUserByManager']);
    Route::post('/deleteByManager', [anyUsersController::class, 'deleteUserByManager']);

    Route::get('/getUsers/{id}', [anyUsersController::class, 'SearchUsers']);

    Route::get('/getUsersByLike/{stringValue}', [anyUsersController::class, 'SearchUsersByLikeStatement']);
});
//Route::get('edit/{userid}', 'anyUsersController@edit');
//Route::post('manualregist', 'homePageController@insertNewUser');

/*Route::get('index', 'homePageController@index')->name('index');
Route::get('about', 'homePageController@about');
Route::get('blog_single', 'homePageController@blog_single');
Route::get('blog', 'homePageController@blog');
Route::get('contact', 'homePageController@contact');
Route::get('restaurant', 'homePageController@restaurant');
Route::get('rooms_single', 'homePageController@rooms_single');
Route::get('rooms', 'homePageController@rooms');
Route::get('signup', 'homePageController@signup');
*/


Auth::routes();



//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Logout', [LoginController::class, 'logout'])->name('logout');


});
