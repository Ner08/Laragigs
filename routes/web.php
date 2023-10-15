<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;


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

//All listings
Route::get('/', [ListingController::class, 'index']);

//Show create post view

Route::get('/listings/create', [ListingController::class, 'create']);

//Store listing data
Route::post('/listings', [ListingController::class, 'store']);

//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);






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
