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
use App\AdminCategorie;

Auth::routes();

#Добавь кнопки на все ссылки чтобы можно было перейти.


// Tests
Route::get('/test', ['uses' => 'TestController@show']);


Route::middleware(['auth', 'lang'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', ['uses' => 'StartController@show', 'as' => 'start']);


//Best products
    Route::get('/products', ['uses' => 'BestController@show', 'as' => 'products']);


    Route::get('/about', function () {
        return view('about');
    })->name('about');


//Selected category
    Route::get('/category/{id}', ['uses' => 'CategoryController@show', 'as' => 'category']);


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


    Route::get('/switch/{locale}', ['uses' => 'LanguageController@setLocalisation', 'as' => 'switch']);

    Route::post('/addToCart', ['uses' => 'AddGoodController@add']);

    Route::post('/addLike', ['uses' => 'LikeController@add', 'as' => 'addLike']);

    Route::post('/saleGoods', ['uses' => 'SaleGoodsController@show']);

    Route::post('/letterMember', ['uses' => 'LetterController@new']);

});


Route::group([/*'prefix' => 'admin',*/
              'middleware' => ['auth', 'lang'/*,'role:admin'*/]
], function () {

    Route::get('/main', ['uses' => 'AdminController@show', 'as' => 'admin']);
    Route::get('/section/{id}', ['uses' => 'AdminChildController@show', 'as' => 'adminChild']);

    Route::post('/addCat', ['uses' => 'AddCategorieController@add']);

    Route::post('/banUser',['uses'=>'BanController@ban']);
    Route::post('/unbanUser',['uses'=>'BanController@unban']);

});










