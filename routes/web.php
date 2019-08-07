<?php

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

Route::get('/Laferre', function () {
    return view('welcome');
});


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

	Auth::routes();
	Route::group(['middleware' => 'auth'], function() {
    Route::get('gestion', function()
	{
   return view('gestion');
	});
 });	


Route::group(['middleware' => 'admin'], function() {

	Route::resource('usuarios','UserController');
	
});
Route::group(['middleware' => 'auth'], function() {

 Route::resource('tableCliente','TableClienteController');
 Route::resource('tableProductos','TableProductosController');
 Route::resource('tableVentas','TableVentasController');


 Route::resource('control','ControlController');

 Route::resource('tableCompras','TableComprasController');

 Route::get('tableVentas/detalle', [
      'uses'=> 'TableVentasController@detalle',
      'as'  => 'tableVentas.detalle'
  ]);

Route::get('tableCompras/detalle', [
      'uses'=> 'TableComprasController@detalle',
      'as'  => 'tableCompras.detalle'
  ]);

Route::get('tableCompras/visible', [
      'uses'=> 'TableComprasController@visible',
      'as'  => 'tableCompras.visible'
  ]);

});

Route::get('control/factura/{id}', [
      'uses'=> 'ControlController@factura',
      'as'  => 'control.factura'
  ]);

Route::get('control/abono/{id}', [
      'uses'=> 'ControlController@abono',
      'as'  => 'control.abono'
  ]);

Route::get('control/guardar', [
      'uses'=> 'ControlController@guardar',
      'as'  => 'control.guardar'
  ]);