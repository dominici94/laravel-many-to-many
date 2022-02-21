<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// AREA PRIVATA BACK OFFICE

// prefix aggiunge admin prima delle rotte;
// namespace: tutti i controller dell'autenticazione saranno nella cartella admin;
// middleware auth permette di non aggiungere ad ogni singolo controller il costruttore con this->middleware('auth');
// group serve solo per  applicare le 3 regole precedenti al gruppo di rotte all'interno della funzione
Route::prefix("admin")->namespace("Admin")->middleware("auth")->group(function () {
    // rotta dell'home controller spostata dentro la cartella admin
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("posts", "PostController");
    Route::resource("categories", "CategoryController");
    Route::resource("tags", "TagController");
});
