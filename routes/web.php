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

Route::get('/', ['uses' => 'page\GdsController@index', 'as' => 'index']);
Route::get('empresa', ['uses' => 'page\GdsController@empresa', 'as' => 'empresa']);
Route::get('productos', ['uses' => 'page\GdsController@productos', 'as' => 'productos']);
Route::get('ecobruma', ['uses' => 'page\GdsController@ecobruma', 'as' => 'ecobruma']);
Route::get('videos', ['uses' => 'page\GdsController@videos', 'as' => 'videos']);
Route::get('clientes', ['uses' => 'page\GdsController@clientes', 'as' => 'clientes']);
Route::get('productos', ['uses' => 'page\GdsController@productos', 'as' => 'productos']);
Route::get('productos/{id}', ['uses' => 'page\GdsController@producto', 'as' => 'producto']);
Route::get('productos/{name}/{id}', ['uses' => 'page\GdsController@productoEspecifico', 'as' => 'productoEspecifico']);
Route::get('proyectos', ['uses' => 'page\GdsController@proyectos', 'as' => 'proyectos']);
Route::get('proyectos/{id}', ['uses' => 'page\GdsController@proyecto', 'as' => 'proyecto']);
Route::get('contacto', ['uses' => 'page\GdsController@contacto', 'as' => 'contacto']);
Route::get('presupuesto', ['uses' => 'page\GdsController@presupuesto', 'as' => 'presupuesto']);

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'adm'], function() {
    Route::get('/', 'adm\AdmController@index');
    Route::get('logout', ['uses' => 'adm\AdmController@logout' , 'as' => 'adm.logout']);
    /**
     * CONTENIDO
     */
    Route::group(['prefix' => 'contenido', 'as' => 'contenido'], function() {
        Route::get('{seccion}/index', ['uses' => 'adm\ContenidoController@index', 'as' => '.index']);
        Route::get('{seccion}/edit', ['uses' => 'adm\ContenidoController@edit', 'as' => '.edit']);
        Route::post('{seccion}/update', ['uses' => 'adm\ContenidoController@update', 'as' => 'update']);
    });
    /**
     * SLIDERS
     */
    Route::group(['prefix' => 'slider', 'as' => 'slider'], function() {
        Route::get('{seccion}/index', ['uses' => 'adm\SliderController@index', 'as' => '.index']);
        Route::post('{seccion}/store', ['uses' => 'adm\SliderController@store', 'as' => '.store']);
        Route::get('edit/{id}', ['uses' => 'adm\SliderController@edit', 'as' => '.edit']);
        Route::get('delete/{id}', ['uses' => 'adm\SliderController@destroy', 'as' => '.destroy']);
        Route::post('update/{id}', ['uses' => 'adm\SliderController@update', 'as' => 'update']);
    });
    /**
     * PROYECTOS
     */
    Route::group(['prefix' => 'proyecto', 'as' => 'proyecto'], function() {
        Route::get('index', ['uses' => 'adm\ProyectoController@index', 'as' => '.index']);
        Route::post('store', ['uses' => 'adm\ProyectoController@store', 'as' => '.store']);
        Route::get('edit/{id}', ['uses' => 'adm\ProyectoController@edit', 'as' => '.edit']);
        Route::get('delete/{id}', ['uses' => 'adm\ProyectoController@destroy', 'as' => '.destroy']);
        Route::post('update/{id}', ['uses' => 'adm\ProyectoController@update', 'as' => 'update']);
    });
    /**
     * PRODUCTOS
     */
    Route::group(['prefix' => 'familia', 'as' => 'familia'], function() {
        Route::get('/', ['uses' => 'adm\FamiliaController@index', 'as' => '.index']);
        Route::get('edit/{id}', ['uses' => 'adm\FamiliaController@edit', 'as' => '.edit']);
        Route::post('update/{id}', ['uses' => 'adm\FamiliaController@update', 'as' => '.update']);
        Route::post('store', ['uses' => 'adm\FamiliaController@store', 'as' => '.store']);
        Route::get('delete/{id}', ['uses' => 'adm\FamiliaController@destroy', 'as' => '.destroy']);

        Route::group(['prefix' => 'producto', 'as' => '.producto'], function() {
            Route::get('/', ['uses' => 'adm\ProductoController@index', 'as' => '.index']);
            Route::get('edit/{id}', ['uses' => 'adm\ProductoController@edit', 'as' => '.edit']);
            Route::post('update/{id}', ['uses' => 'adm\ProductoController@update', 'as' => '.update']);
            Route::post('store', ['uses' => 'adm\ProductoController@store', 'as' => '.store']);
            Route::get('delete/{id}', ['uses' => 'adm\ProductoController@destroy', 'as' => '.destroy']);
        });
    });
    /**
     * DATOS GDS
     */
    Route::group(['prefix' => 'empresa', 'as' => 'empresa'], function() {
        Route::get('index', ['uses' => 'adm\EmpresaController@index', 'as' => '.index']);
        Route::get('metadatos', ['uses' => 'adm\EmpresaController@metadatos', 'as' => '.metadatos']);
        Route::get('metadato/{id}', ['uses' => 'adm\EmpresaController@metadato', 'as' => '.metadato']);
        Route::post('metadato/{id}', ['uses' => 'adm\EmpresaController@metadatoPOST', 'as' => '.metadato']);
        
        Route::get('usuarios', ['uses' => 'adm\EmpresaController@usuarios', 'as' => '.usuarios']);
        Route::get('edit/{id}', ['uses' => 'adm\EmpresaController@edit', 'as' => '.edit']);
        Route::get('delete/{id}', ['uses' => 'adm\EmpresaController@destroy', 'as' => '.destroy']);
        Route::post('{seccion}/update', ['uses' => 'adm\EmpresaController@update', 'as' => 'update']);
    });
});