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

/* AQUI ES DEFINEIXEN LES RUTES DEL LLOC WEB*/

/* AIXO S'ANOMENA UNA FACHADA, EN AQUEST CAS LA FACHADA "ROUTE"
I UTILITZA EL METODE GET */

/* '/' -> el mappeig de la ruta
    return view() -> Retorna una vista anomanada 'welcome' */

    /*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('posts');
});

Route::get('posts/{post}', function ($slug) {

    /* file_get_contents(__DIR__) ens dona la ruta a aquest fitxer. */
    $rutapost = file_get_contents(__DIR__ . "/../resources/posts/{$slug}.html");
    
    if (! file_exists($rutapost)){
        dd('file does not exits');
    }


    return view('post', [
        'post' => $rutapost
    ]);
});

/* RETORNAR STRING 
Route::get('/hello', function () {
    return 'Hello World';
});

RETORNAR JSON 
Route::get('/json', function () {
    return ['foo' => 'bar'];
});

Route::get('/home', function () {
    return view('index');
});

*/
