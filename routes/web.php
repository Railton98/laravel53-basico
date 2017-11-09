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

/* Rotas de Teste...

Route::group(['prefix' => 'painel'], function() {
    Route::get('/users', function() {
        return 'Painel Usuários!';
    });
    Route::get('/financeiro', function() {
        return 'Painel Financeiro!';
    });
    Route::get('/', function() {
        return 'Dashboard!';
    });
});

Route::get('/categoria2/{idCat?}', function($idCat = '-') {
    return "Posts da Categoria {$idCat}";
});

Route::get('/categoria/{idCat}/{nomeCat}', function($idCat,$nomeCat) {
    return "Posts da Categoria {$idCat} - {$nomeCat}";
});

Route::get('/empresa', function () {
    return view('empresa');
});

Route::get('/teste', function () {
    return 'Rota Teste!';
});

Route::match(['get', 'post'], '/match', function() {
    return 'Route Match!';
});

\\Rotas de Teste*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/painel/produtos/tests', 'Painel\ProdutoController@tests');

Route::resource('/painel/produtos', 'Painel\ProdutoController');

Route::group(['namespace' => 'Site'], function() {

    Route::get('/teck', 'SiteController@index');

    Route::get('/contato', 'SiteController@contato');

    Route::get('/empresa', 'SiteController@empresa');

    Route::get('/categoria/{id}', 'SiteController@categoria');

    Route::get('/categoria2/{id?}', 'SiteController@categoriaOp');
});
