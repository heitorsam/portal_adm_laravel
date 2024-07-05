<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource('produtos', ProdutoController::Class);








/*
Route::get('/empresa', function(){
    return view('site/empresa');
});
*/

Route::view('/empresa', 'site/empresa');

Route::view('/info', 'site/info');

Route::any('/any', function(){
    return "Permite todo acesso http";
});

Route::match(['get','post'],'/match', function(){
    return "Permite dados definidos";
});

Route::get('/produto/{id}/{categoria?}', function($id, $categoria = 'Não Definida'){

    return "O id do produto é: ". $id . " e a categoria é: " . $categoria;

});

Route::redirect('/sobre', '/empresa');

Route::get('/news', function(){
    return view('site/news');
})->name('noticias');

Route::get('/novidades', function(){
    return redirect()->route('noticias');
});


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function(){

    Route::get('cliente', function () {
        return view('admin.cliente');
    })->name('cliente');

    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('user', function () {
        return view('admin.user');
    })->name('user');

});