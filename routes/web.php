<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PostController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Route;


/* Route::get('/', function () {
    return view('welcome');
});
 */
/* 
Metodo VIEW como primer parametro recibe la url a la que va arespomnnder
y como segundo parametro la vista que queremos mostra
*/

//RUTAS DE TIPO GET

//pesonal-site.com => welcome
Route::view('/', 'welcome')->name('home');

//pesonal-site.com/contacto => contact
Route::view('/contact', 'contact')->name('contact');


//pesonal-site.com/blog => blog
//Route::get('/blog', [PostController::class, 'index'])->name('posts.index'); //utilizaremos la clase para controlar
//Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');
//Route::post('/blog', [PostController::class, 'store'])->name('posts.store'); /* create para crear el blog y store para almacenarlo */
//Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show'); /* utiliza otro metodo show   (mostramos al final las rutas que reciben parametros y bvariables)*/
//Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); /* utiliza otro metodo show   (mostramos al final las rutas que reciben parametros y bvariables)*/
//Route::patch('/blog/{post}', [PostController::class, 'update'])->name('posts.update');
//Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::resource('blog', PostController::class, [
    'names' => 'posts',
    'parameters' => ['blog' => 'post']
]);

//pesonal-site.com/about => about
/* middleware para autenticar al usuario */
Route::view('/about', 'about')->name('about')->middleware('auth');


/* devuelve una vista al entar a register */
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);