<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


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

//LISTINGS

//All listings
Route::get('/', [ListingController::class, 'index']);

//Show create post view

Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show edit form
Route::get('listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


//USERS

//Show Register/Create Form

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log In user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');;











//Learning

Route::get('/hello', function () {
    return response('<h1>Hello World</h1>')
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

Route::get('post/{id}', function ($id) {
    return response('Post' . $id);
})->where('id', '[0-9]');

Route::get('/search', function (Request $request) {
    return ($request->name . ' ' . $request->city);
});

Route::get('/test', function () {
    return view("view");
});
