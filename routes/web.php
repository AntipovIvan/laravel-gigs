<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

// All listings
Route::get('/', [ListingController::class, 'index']);

Route::get('/test', function () {
    phpinfo();
});

// Show Create form
Route::get('/listings/create', [ListingController::class, 'create'])
->middleware('auth');

// Store Listing Data
Route::post('/listings',[ListingController::class, 'store'])
->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])
->middleware('auth');

// Update listing
Route::put('/listings/{listing}',[ListingController::class,'update'])
->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])
->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])
->middleware('auth');

// Single Listing
Route::get('/listings/{listing}',[ListingController::class, 'show']);

// Show register/create form
Route::get('/register', [UserController::class, 'create'])
->middleware('guest');

// Create new user
Route::post('/users', [UserController::class,'store']);

// Log user out
Route::post('/logout',[UserController::class, 'logout'])
->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])
->name('login')->middleware('guest');

// Log in user
Route::post('/users/authenticate',[UserController::class, 'authenticate']);



// Route::get('/hello', function () {
//     return response('<h1>Hello World</h1>',200)
//     ->header('Content-Type','text/plain')
//     ->header('foo','bar');
// });

// Route::get('/posts/{id}', function ($id) {
//     // ddd($id);
//     return response('Post '.$id);
// })->where('id','[0-9]+');

// Route::get('/search', function (Request $request) {
//     return($request->name . ' ' . $request->city);
// });