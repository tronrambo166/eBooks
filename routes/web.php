<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\testController;

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

 Route::get('login/', 'HomeController@login')->name('login');
 Route::get('register/', 'HomeController@register')->name('register');

 Route::get('forgot/{remail}', 'testController@forgot')->name('forgot');
// Route::post('send_reset_email', 'testController@send_reset_email')->name('send_reset_email');
// Route::post('reset/{remail}', 'testController@reset')->name('reset');
Route::group(['middleware'=>['auth']], function(){

Route::get('cart', 'HomeController@cart')->name('cart');
Route::get('addToCart/{id}', 'HomeController@addToCart')->name('addToCart');
Route::get('removeCart/{id}', 'HomeController@delete_cart')->name('removeCart');
Route::post('up_quantity/{id}', 'HomeController@up_quantity')->name('up_quantity');
});

//Route::get('{anypath}', 'testController@home')->where('path', '.*');

Route::get('/', 'HomeController@home');
Route::get('home', 'HomeController@home')->name('home');
Route::get('about', 'HomeController@about')->name('about');
Route::get('shop', 'HomeController@shop')->name('shop'); 



Route::get('checkout', 'HomeController@checkout')->name('checkout');
Route::post('checkout', 'HomeController@checkoutP')->name('checkoutP');


// Payment Routes
//Route::get('/stripe', 'CheckoutController@stripe');
Route::get('/stripe/{amount}_{ids}', [HomeController::class, 'goCheckout'])->name('stripe');
Route::post('/stripe', [HomeController::class, 'stripePost'])->name('stripe.post');


/*****************ADMIN ROUTES*******************/
Route::Group(['prefix' => 'admin'], function () { 
    Route::get('/','adminController@index_admin');
    Route::get('/login','adminController@login')->name('loginA');
    Route::get('/index_admin','adminController@index_admin')->name('index_admin');
    Route::get('/logoutA','adminController@logout')->name('logoutA');

        Route::get('/users', 'adminController@users')->name('users');
         Route::get('/del_users/{id}', 'adminController@del_users')->name('del_users');

         //books     
         Route::get('/books', 'adminController@books')->name('/books');
         Route::post('/add_books', 'adminController@add_books')->name('add_books');
         Route::post('/up_books', 'adminController@up_books')->name('up_books');
         Route::get('/del_books/{id}', 'adminController@del_books')->name('del_books');

     
        Route::post('/adminLogin', 'adminController@adminLogin')->name('adminLogin');


    Route::get('forgot/{remail}', 'adminController@forgot')->name('forgot');
    Route::post('send_reset_email', 'adminController@send_reset_email')->name('send_reset_email');
    Route::post('reset/{remail}', 'adminController@reset')->name('reset');
       
    });


Route::get('clear_cache', function () {
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    dd("Cache is cleared");
});

Auth::routes();