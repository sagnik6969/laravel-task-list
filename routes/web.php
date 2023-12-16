<?php

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



// Route::get('/', function () {
//     return view('welcome');
// });

//view is a laravel function => going to cover later


Route::get('/', function () {
    return "Main page";
    // Main page is displayed
});

Route::get('/hello', function () {
    return 'hello';
})->name('hello');

// dynamic routes
Route::get('/greet/{name}', function ($name) {
    return "Hello $name";
});


//Redirecting
Route::get('/hallo', function () {
    return redirect('/hello');
});


// Named routes 
Route::get('/hellow', function () {
    return redirect()->route('hello');
    //   redirects to the route named hello;
});




// If no other route has been matched
Route::fallback(function () {
    return 'Route not found';
});



// php artisan route:list => gives a list of all the routes in the application

// Here get is an http method
// GET => fetch data
// POST => store new data
// PUT => modify an existing field
// delete => delete data
