<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Administrate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//main website
Route::get('/mainpage', function () {
    return view('index');
});
//EMAIL VERIFICATION MODULE: MAILTRACK.IO----EMAIL TESTING NOT WORKING 
Auth::routes(['verify'=>true]);

//admin page upon login//USED FOR LOG OUT HREF SINCE POST/DELETE DON'T WORK
Route::get('/login', function () {
    return view('admin.login');
})->name('loginform');//app/http/middleware/authenticate

/*Route::get('/admin-users', function () {
    return view('admin.users');
})->name('users');//app/http/middleware/redirectifauthenticated //app/providers/routeserviceprovider
*/

//AUTHENTICATION MODULE----WORKING
//test register
Route::get('/registerview', [RegisterController::class, 'registerview'])->name('registerview');//->middleware('guest');
Route::post('/registersave', [RegisterController::class, 'register'])->name('register');//->middleware('guest');
//test login
Route::get('/loginview', [LoginController::class, 'loginview'])->name('loginview');//->middleware('guest');
Route::post('/loginsave', [LoginController::class, 'login'])->name('login');//->middleware('guest');

//----LOG OUT POST or DELETE DOESN'T WORK----BETTER DELETE ALL SESSIONS IN storage/framework/sessions
//OR CHANGE SESSION COOKIE NAME IN ENV FILE
//Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//USERS ROUTES AND VIEWS
Route::prefix('USERS')->group(function(){
    //test if not authenticated, go to route('login'), else go to view in index
    //ONLY CONTROL USERS IF LOG IN AND IF YOUR USERNAME IS ADMIN, ADMIN1, ADMIN2...ETC
    Route::get('/users-admin', [UserController::class , 'index'])->name('users.html')->middleware('auth'); 

    Route::get('/users-addview', [UserController::class, 'create'])->name('addUser.html')->middleware(['auth', 'admin']);
    Route::post('/users-addsave', [UserController::class, 'store'])->name('saveNew');

    Route::delete('/users-delete/{id}', [UserController::class , 'destroy'])->name('users-delete')->middleware(['auth', 'admin']);

    Route::get('/users-editview/{id}', [UserController::class, 'edit'])->name('editUser.html')->middleware(['auth', 'admin']);
    Route::post('/users-editsave/{id}', [UserController::class, 'update'])->name('saveEdit');

});

//CATEGORY CONTROLLER
//CATEGORY MODEL 1:MANY
//CATEGORIES ROUTES AND VIEWS
Route::prefix('CATEGORIES')->group(function(){

});


//BEVERAGES ROUTES AND VIEWS
Route::prefix('BEVERAGES')->group(function(){

});


//MESSAGES CONTROLLER