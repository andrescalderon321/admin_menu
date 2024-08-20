<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use app\http\Controllers\EmployeeController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\TableController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/empleados',[HomeController::class,'employees'])->name('empleado');
Route::get('/home/administrador',[HomeController::class,'admins'])->name('admin');
Route::get('/home/menu',[HomeController::class,'menu'])->name('menu');
Route::get('/home/inventarios',[HomeController::class,'inventory'])->name('inventario');
Route::get('/home/proveedor',[HomeController::class,'supplier'])->name('provedores');
Route::get('/home/pedidos',[HomeController::class,'order'])->name('ordenes');
Route::get('/home/mesas',[HomeController::class,'tables1'])->name('mesas');
Route::get('/home/ventas',[HomeController::class,'sale'])->name('ventas');



// ruta para crear los registros de employes____
Route::post('/home/create',[HomeController::class,'create'])->name('create');
// ruta para actualizar los registros de employes
Route::post('/home/update',[HomeController::class,'update'])->name('update');
// ruta para eliminar id de employees
Route::get('/home/delete-{id}',[HomeController::class,'delete'])->name('delete');

// ruta para crear los registros de los admins___
Route::post('/home/create_admin',[HomeController::class,'create_admin'])->name('create_admin');
// ruta para actualizar los registros de admins
Route::post('/home/update_admin',[HomeController::class,'update_admin'])->name('update_admin');
// ruta para eliminar id de menu de admins
Route::get('/home/delete_admin-{id}',[HomeController::class,'delete_admin'])->name('delete_admin');

// ruta para crear los registros de menu de comidas____
Route::post('/home/create_menu',[HomeController::class,'create_menu'])->name('create_menu');
// ruta para actualizar los registros de menu de comidas
Route::post('/home/update_menu',[HomeController::class,'update_menu'])->name('update_menu');
// ruta para eliminar id de menu de comidas 
Route::get('/home/delete_menu-{id}',[HomeController::class,'delete_menu'])->name('delete_menu');

// ruta para crear los registros de menu de inventarios____
Route::post('/home/create_inv',[HomeController::class,'create_inv'])->name('create_inv');
// ruta para actualizar los registros de menu de inventarios
Route::post('/home/update_inv',[HomeController::class,'update_inv'])->name('update_inv');
// ruta para eliminar id de menu de inventarios 
Route::get('/home/delete_inv-{id}',[HomeController::class,'delete_inv'])->name('delete_inv');

// ruta para crear los registros de menu de porveedores____
Route::post('/home/create_sup',[HomeController::class,'create_sup'])->name('create_sup');
// ruta para actualizar los registros de menu de proveedores
Route::post('/home/update_sup',[HomeController::class,'update_sup'])->name('update_sup');
// ruta para eliminar id de menu de proveedores 
Route::get('/home/delete_sup-{id}',[HomeController::class,'delete_sup'])->name('delete_sup');

// ruta para crear los mesas ____
Route::post('/home/create_table',[HomeController::class,'create_table'])->name('create_table');
// ruta para actualizar las mesas
Route::post('/home/update_table',[HomeController::class,'update_table'])->name('update_table');
// ruta para eliminar id de mesas
Route::get('/home/delete_table-{id}',[HomeController::class,'delete_table'])->name('delete_table');

// ruta para crear los pedidos ____
Route::post('/home/create_pedidos',[HomeController::class,'create_order'])->name('create_order');
// ruta para actualizar los pedidos
Route::post('/home/update_pedidos',[HomeController::class,'update_order'])->name('update_order');
// ruta para eliminar id de pedidos
Route::get('/home/delete_pedidos-{id}',[HomeController::class,'delete_order'])->name('delete_order');

// ruta para crear registros de ventas____
Route::post('/home/create_ventas',[HomeController::class,'create_sale'])->name('create_sale');
// ruta para actualizar las ventas
Route::post('/home/update_ventas',[HomeController::class,'update_sale'])->name('update_sale');
// ruta para eliminar id de ventas
Route::get('/home/delete_ventas-{id}',[HomeController::class,'delete_sale'])->name('delete_sale');






// Route::resource('mesas', TableController::class );
// Route::resource('ordenes',OrdenController::class );



// Route::get('/home/provedores',[HomeController::class,'suppliers'])->name('provedores');


Route::get('/home/suscriptores',[HomeController::class,'subscriber'])->name('suscriptores');
Route::get('/home/ventas',[HomeController::class,'sale'])->name('ventas');

