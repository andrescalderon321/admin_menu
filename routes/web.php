<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use app\http\Controllers\EmployeeController;
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/empleados',[HomeController::class,'employees'])->name('empleado');
Route::get('/home/administrador',[HomeController::class,'admins'])->name('admin');
Route::get('/home/menu',[HomeController::class,'menu'])->name('menu');


// ruta para crear los registros de employes____
Route::post('/home/create',[HomeController::class,'create'])->name('create');
// ruta para actualizar los registros de employes
Route::post('/home/update',[HomeController::class,'update'])->name('update');
// ruta para eliminar id de employees
Route::get('/home/delete-{id}',[HomeController::class,'delete'])->name('delete');

// ruta para crear los registros de los admins___
Route::post('/home/create_admin',[HomeController::class,'create_admin'])->name('create_admin');
// ruta para actualizar los registros de admins
Route::post('/home/update_admin',[HomeController::class,'update'])->name('update');

// ruta para crear los registros de menu de comidas____
Route::post('/home/create_menu',[HomeController::class,'create_menu'])->name('create_menu');
// ruta para actualizar los registros de menu de comidas
Route::post('/home/update_menu',[HomeController::class,'update_menu'])->name('update_menu');
// ruta para eliminar id de menu de comidas 
Route::get('/home/delete_menu-{id}',[HomeController::class,'delete_menu'])->name('delete_menu');

Route::get('/home/inventarios',[HomeController::class,'inventories'])->name('inventario');
Route::get('/home/pedidos',[HomeController::class,'orders'])->name('pedidos');
Route::get('/home/provedores',[HomeController::class,'suppliers'])->name('provedores');
Route::get('/home/suscriptores',[HomeController::class,'subscriber'])->name('suscriptores');
Route::get('/home/ventas',[HomeController::class,'sale'])->name('ventas');

