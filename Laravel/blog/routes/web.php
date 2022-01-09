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

/* AIXO S'ANOMENA UNA FACHADA, EN AQUEST CAS LA FACHADA "ROUTE"
I UTILITZA EL METODE GET */
Route::get('/', function () {
    return view('welcome');
});
