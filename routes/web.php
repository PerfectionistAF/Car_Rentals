<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController; //use the class ProfileController
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CollectiveViewController;//task 4
use App\Http\Controllers\PostsController;//task 7
use App\Http\Middleware\CheckAge;//use checkAge
use App\Http\Middleware\CheckUser;//use checkAdmin
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome'); //home page of project called 'welcome'
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//test
//ANONYMOUS FUNCTION: USED WHEN RESULT IS RETURNED TO ANOTHER FUNCTION::CALLBACK FUNCTION
Route::get('/test', function(){ //CALLED USING GET REQUEST
    echo "Hello World";
});

//categories/mobile
//URI or request + callback 
Route::get('categories/mobile', function(){ //localhost/categories/mobile
    echo "Hello Mobile!!";
});

//REGULAR FUNCTION
// when URL is localhost/test both regular and anonymous run
function greeting(){
    Route::get('/test', function(){ //CALLED USING GET REQUEST
        echo "Hello World";
    });
    echo "<br>";
    echo "GOOD EVENING";
    echo "<br>";

};
function greeting2(){
    echo "<h2 style=color:purple>GOOD EVENING</h2>";

};
//called first then get request, always runs 
//greeting();
//greeting2();

//send parameter in route
Route::get('/welcome/user-{name}', function($name){
    return "<h2>Welcome, $name</h2>";
});

$_GLOBALS["pattern"] = "/ba(na){2}/i";
//send multiple parameters with constraints
//? optional parameter //id has a default value
Route::get('/welcome/{name}/profile/{id?}', function($name, $id = 1111){
    return "<h2 style:font-color:red>Welcome customer number $id, $name </h2>";
})->where(["id"=>"[^0-1]+", "name"=>"[A-Za-z]+"]);//associative array//regular expression [0-1]+ at least once
//regular expression: a word that always starts in S /S\b+/ OR //

//group several functions
Route::prefix('users')->group(function(){
    Route::get('add', function(){
        return "<h2 style=color:red> ADD USER </h2>";
    });
    Route::get('delete', function(){
        return "<h2 style=color:orange> DELETE USER </h2>";
    });
});

//callback and redirect to home page if error
Route::fallback(function(){
    return redirect('/');
});

//form
//Route::get('/getform', function(){
//    return view('form');
//});

//to only get the view, no functions
Route::view('/getform', 'form');  //STEP ONE: GET FORM

//home
//Route::view('/gethome', 'home');
Route::get('/gethome', function(){  //try in get method and post method
    $data = ['first_name'=>'Sohayla', 'last_name'=>'Hamed'];
    return view('home', $data); //return a php array 
    //if returned as a single value: return view('home', $data)
})->name('home');//aliasing home 

Route::post('receive', function(){
    return view('submitform');//after form data is sent via post method then i submit the form and show its view
})->name('receive');


////////TASK THREE
//First page: view contact us page
Route::view('/contact_us', 'contact_us'); //or ->middleware(CheckAge::class) 
//After post
//Second page: view about us page
Route::post('readmore', function(){
    return view('about_us');
})->name('readmore');
//Third page : get home page
Route::get('/home', function(){  
    $data = ['first_name'=>'Sohayla', 'last_name'=>'Hamed'];
    return view('home', $data); 
})->name('home');

//get about_us page
Route::get('/about_us', function(){
    return view('about_us');
})->name('about_us');

//get contact_us page
Route::get('/contact_us', function(){
    return view('contact_us');
})->name('contact_us');


/////SESSION 4
//try controller
Route::get('/customer', [CustomerController::class , 'index']);
Route::get('/data', [CustomerController::class , 'data']);
//try invokable or single action controller
Route::get('/userprofile', [UserProfileController::class, '__invoke']);//call the single action method
//can remove the method

//try resource controller--CRUD
Route::resource('/photos', PhotoController::class);
/*Route::post('photos.store', function(){
    return view('photos.list');
})->name('photos.store');*/
/*
Verb	    URI	                    Action	Route Name
GET	        /photos	                index	photos.index
GET	        /photos/create	        create	photos.create
POST	    /photos	                store	photos.store
GET	        /photos/{photo}	        show	photos.show
GET	        /photos/{photo}/edit	edit	photos.edit
PUT/PATCH	/photos/{photo}	        update	photos.update
DELETE	    /photos/{photo}	        destroy	photos.destroy
*/


////////TASK FOUR
//get method for home page
Route::get('/home-control', [CollectiveViewController::class , 'home']);
//get method for about us page
Route::get('/about-control', [CollectiveViewController::class , 'about_us']);
//get method for contact us page
Route::get('/contact-control', [CollectiveViewController::class , 'contact_us']);
//post method for contact us page
Route::post('/submit-control', [CollectiveViewController::class , 'submit']);


/////SESSION 5
Route::view('/contact_us/{age}', 'contact_us')->middleware('checkAge'); //or ->middleware(CheckAge::class)

//group of routes checked by a specific middlewate
Route::middleware('CheckAge')->group(function(){
    Route::get('/test_middle_gp1', function(){

    });
    Route::get('/test_middle_gp2', function(){

    });
    ///exempt this route from middleware
    Route::get('/test_middle_gp3', function(){

    })->withoutMiddleware('CheckAge');
});
/*to connect to db:
.env file --->database 
phpmyadmin
php artisan migrate --->db schema
config/database.php
php artisan migrate:rollback  returns to last state
php artisan migrate:status returns status of migrate
php artisan migrate:refresh  rollback then rerun the migrations ///deletes previous data
php artisan migrate:fresh    drop migrations then recreate them  ///deletes previous data
CAN YOU ADD MORE MIDDLEWARES PER ROUTE?

php artisan make:migrations table
*/

////////TASK FIVE
Route::get('/admin/{name}', function () {
    $data = ['admin'=>'Sohayla'];
    return view('home', $data); 
})->name('home')->middleware(CheckUser::class);

/////SESSION 6
/*create a migration with its own table
php artisan make:migration create_products_table --create=products

add migration to database
php artisan make:migration create_products_table --table=products

FOREIGN KEY: ONE TO MANY RELATION
1 customer has many orders
*/

////////TASK SIX
/*
create posts migration
add columns (post_title, post_content, post_date)
add foreign key (user_id)
run migration
*/

/////SESSION 7
//try controller after db facade
Route::get('/customers', [CustomerController::class , 'index'])->name('customers');//route function takes alias
///php artisan make:model Customers -m
//model with -m tag makes model and migration at the same time
//to create customer
//change between dynamic and static insertion----SESSIONS 7 AND 8
Route::get('/customers-create', [CustomerController::class , 'create'])->name('customers-create');
Route::post('/customers-store', [CustomerController::class , 'store'])->name('customers-store');
/////SESSION 8
Route::get('customers-edit/{id}', [CustomerController::class , 'edit'])->name('customers-edit');
Route::post('/customers-update/{id}', [CustomerController::class , 'update'])->name('customers-update');


////////TASK SEVEN
/*
create posts controller
create posts model
view data in posts table
insert data in posts table
*/
Route::get('/posts',[PostsController::class, 'index']);
Route::get('/posts-create',[PostsController::class, 'create']);

////////TASK EIGHT
/*
create users controller
insert, update and select data operations
*/
Route::get('/users', [UserController::class , 'index'])->name('users');
Route::get('/users-create', [UserController::class , 'create'])->name('users-create');
Route::post('/users-store', [UserController::class , 'store'])->name('users-store');
Route::get('/users-edit/{id}', [UserController::class , 'edit'])->name('users-edit');
Route::post('/users-update/{id}', [UserController::class , 'update'])->name('users-update');