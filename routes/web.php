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

//1-vamos agregar una ruta de tipo resource, para hacer un grupo de rutas de recursos,con las peticiones edit, update, create, index, show, estas son las operaciones más usadas en laravel, laravel las agrupas en usa sola ruta de tipo resource

//esta ruta va ligar a un controlador, vamos a crear un carpeta dentro de vista almacen y dentro de almacen otra subcarperta que vamos a llamar categroria //es decir cuando el usuario entre a almacen/categoria vamos hacer una liga a

Route::resource('almacen/categoria','CategoriaController');
