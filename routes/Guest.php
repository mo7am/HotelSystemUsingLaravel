
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuistController;
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

    Route::post('/book_now', [GuistController::class, 'book'])->name('BookNow');

});
