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

Route::get('/', 'WebController@index')->name('web.index');


//Route::any('users/{id}', '');
Route::get('/productos', 'WebController@productos')->name('web.shop');
Route::post('/producto/buscado', 'WebController@productosearch')->name('web.shop.search');
Route::get('/producto/{id}', 'WebController@producto')->name('web.product');
Route::get('/blog', 'WebController@blog')->name('web.blog');
Route::get('/post/{slug}', 'WebController@postDetail')->name('blog.detail');
Route::get('/categorias/{id?}', 'WebController@productosCategoria')->name('web.categories');
Route::get('/checkout', 'WebController@checkout')->name('web.checkout');
Route::get('/mercado-pago/{refernce_id}', 'WebController@mercadopago')->name('web.mercadopago');
Route::get('/procesar-pago', 'WebController@procesar')->name('web.procesar');
Route::get('/contact', 'WebController@contact')->name('web.contact');
Route::get('/regular-page', 'WebController@regular-page')->name('web.regular-page');
Route::get('/single-blog', 'WebController@single-blog')->name('web.single-blog');
Route::get('/single-product-details', 'WebController@single-product-details')->name('web.single-product-details');
Route::post('/order', 'WebController@order')->name('web.save.order');
Route::post('/suscribe', 'NotifyController@suscribe')->name('suscribe.save');
Route::get('/gracias', 'NotifyController@thanks')->name('suscribe.thanks');
Route::get('/cotizar', 'NotifyController@cotizar')->name('quote.request');
Route::post('/guardar-cotizacion', 'NotifyController@quoteSave')->name('quote.save');
Route::get('/gracias-por-cotizar', 'NotifyController@thanksQuote')->name('quote.thanks');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/ventas', 'SaleController@index');
    Route::get('/ventas/detalles/{id}', 'SaleController@details')->name('sales.details');
});
