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


Auth::routes();
#Route::get('/logout', 'LoginController@logout');
#Route::get('/register', 'LoginController@logout');


// Tests
Route::get('/test', ['uses' => 'TestController@show']);


Route::middleware(['auth', 'lang'])->group(function () {

    Route::get('/home', 'Auth\HomeController@index')->name('home');
    Route::get('/', ['uses' => 'MainControllers\StartController@show', 'as' => 'start']);


//Best products
    Route::get('/products', ['uses' => 'MainControllers\BestController@show', 'as' => 'products']);


    Route::get('/about', function () {
        return view('about');
    })->name('about');


//Selected category
    Route::get('/category/{id}', ['uses' => 'MainControllers\CategoryController@show', 'as' => 'category']);


    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');

    Route::get('/events', function () {
        return view('events');
    })->name('events');

    Route::get('/faqs', function () {
        return view('faqs');
    })->name('faqs');

    Route::get('/mail', function () {
        return view('mail');
    })->name('mail');


    Route::get('/paymant', function () {
        return view('paymant');
    })->name('paymant');

    Route::post('/paymants', function () {
        return view('paymants');
    })->name('payment');

    Route::get('/pet', function () {
        return view('pet');
    })->name('pet');

    Route::get('/privacy', function () {
        return view('privacy');
    })->name('privacy');

    Route::get('/services', function () {
        return view('services');
    })->name('services');


    Route::get('/switch/{locale}',
        ['uses' => 'SecondaryControllers\LanguageController@setLocalisation', 'as' => 'switch']);

    Route::post('/addToCart', ['uses' => 'MainControllers\AddGoodController@add']);

    Route::post('/addLike', ['uses' => 'SecondaryControllers\LikeController@add', 'as' => 'addLike']);

    Route::post('/saleGoods', ['uses' => 'MainControllers\SaleGoodsController@show']);

    Route::post('/letterMember', ['uses' => 'MainControllers\SecondaryControllers\LetterController@new']);

    Route::get('/search', ['uses' => 'MainControllers\SearchController@search']);

});


Route::group([
    'prefix'     => 'admin',
    'middleware' => ['auth', 'lang', 'admin']
], function () {

    Route::get('/main', ['uses' => 'AdminControllers\AdminController@show', 'as' => 'admin']);
    Route::get('/section/{id}', ['uses' => 'AdminControllers\AdminChildController@show', 'as' => 'adminChild']);

    Route::post('/addCat', ['uses' => 'AdminControllers\AddCategorieController@add']);
    Route::post('/updateCat', ['uses' => 'AdminControllers\AddCategorieController@update']);

    Route::post('/banUser', ['uses' => 'AdminControllers\BanController@ban']);
    Route::post('/unbanUser', ['uses' => 'AdminControllers\BanController@unban']);

});

//php artisan make:controller folder/name --plain









Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
