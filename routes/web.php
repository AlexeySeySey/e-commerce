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

Route::middleware(['auth', 'lang','cart-info'])->group(function () {

    Route::get('/home', 'Auth\HomeController@index')->name('home');
    Route::get('/', ['uses' => 'MainControllers\StartController@show', 'as' => 'start']);


    Route::get('/products', ['uses' => 'MainControllers\BestController@show', 'as' => 'products']);


    Route::get('/category/{id}', ['uses' => 'MainControllers\CategoryController@show', 'as' => 'category']);


    Route::get('/about',['uses'=>'MainControllers\AboutController@show','as'=>'about']);

    Route::get('/events',['uses'=>'MainControllers\EventsController@show','as'=>'events']);

    Route::get('/faqs',['uses'=>'MainControllers\FaqController@show','as'=>'faqs']);

    Route::get('/mail',['uses'=>'MainControllers\MailController@show','as'=>'mail']);

    Route::get('/checkout',['uses'=>'MainControllers\CheckoutController@show','as'=>'checkout']);

    Route::get('/payment',['uses'=>'MainControllers\PayController@show','as'=>'payment']);



    Route::get('/privacy',['uses'=>'MainControllers\PrivacyController@show','as'=>'privacy']);

    Route::get('/services',['uses'=>'MainControllers\ServicesController@show','as'=>'services']);


    Route::get('/switch/{locale}',
        ['uses' => 'SecondaryControllers\LanguageController@setLocalisation', 'as' => 'switch']);

    Route::post('/addToCart', ['uses' => 'MainControllers\AddGoodController@add']);

    Route::post('/addLike', ['uses' => 'SecondaryControllers\LikeController@add', 'as' => 'addLike']);

    Route::post('/saleGoods', ['uses' => 'MainControllers\SaleGoodsController@show']);

    Route::post('/letterMember', ['uses' => 'SecondaryControllers\LetterController@new']);

    Route::get('/search', ['uses' => 'MainControllers\SearchController@search']);

});

Route::group([
    'prefix'     => 'admin',
    'middleware' => ['auth', 'lang', 'admin']
], function () {


    Route::post('/addCat', ['uses' => 'AdminControllers\AddCategorieController@add','as'=>'addCat']);
    Route::post('/updateCatImg', ['uses' => 'AdminControllers\AddCategorieController@updateImg','as'=>'updateCatImg']);
    Route::post('/updateCatName', ['uses' => 'AdminControllers\AddCategorieController@updateName','as'=>'updateCatName']);

    Route::post('/banUser', ['uses' => 'AdminControllers\BanController@ban','as'=>'banUser']);
    Route::post('/unbanUser', ['uses' => 'AdminControllers\BanController@unban']);
    Route::get('/searchUser', ['uses' => 'AdminControllers\SearchController@searchUser']);

    Route::post('/softDeleteCategorie',['uses'=>'AdminControllers\DropCategorieController@hide','as'=>'softDeleteCategorie']);
    Route::post('/realDeleteCategorie',['uses'=>'AdminControllers\DropCategorieController@drop','as'=>'realDeleteCategorie']);

    Route::post('/restoreCategorie',['uses'=>'AdminControllers\AdminCategoriesController@restore','as'=>'restoreCategorie']);


    Route::get('/', ['uses' => 'AdminControllers\AdminController@show', 'as' => 'admin']);
    Route::get('/admin-categories',['uses'=>'AdminControllers\AdminCategoriesController@show','as'=>'categories']);
    Route::get('/admin-users',['uses'=>'AdminControllers\AdminUsersController@show','as'=>'users']);

    Route::get('/admin-goods',['uses'=>'AdminControllers\AdminGoodsController@show','as'=>'goods']);
    Route::post('/admin-goods-delete',['uses'=>'AdminControllers\AdminGoodsController@delete']);
    Route::post('/admin-goods-edit',['uses'=>'AdminControllers\AdminGoodsController@edit']);
    
    Route::get('/searchProduct', ['uses' => 'AdminControllers\SearchController@searchProduct']);
    Route::get('/createNewProduct', ['uses' => 'AdminControllers\AdminGoodsController@createProduct']);
    Route::post('/saveNewProduct', ['uses' => 'AdminControllers\AdminGoodsController@saveProduct']);

    Route::get('/admin-news',['uses'=>'AdminControllers\AdminNewsController@show','as'=>'news']);
    Route::get('/createNewEvent', ['uses' => 'AdminControllers\AdminNewsController@createEvent']);
    Route::post('/saveNewEvent', ['uses' => 'AdminControllers\AdminNewsController@saveEvent']);
    Route::post('/editEvent', ['uses' => 'AdminControllers\AdminNewsController@editEvent']);
    
    Route::get('/admin-sales',['uses'=>'AdminControllers\AdminSalesController@show','as'=>'sales']);
    Route::get('/admin-statistics',['uses'=>'AdminControllers\AdminStatisticsController@show','as'=>'statistics']);

});




 // Set main role for testing purposes

/*
    Route::get('/settingRole',function(){
      $user = \App\Models\User::find(\Auth::id());
      $user->attachRole('admin');
      return 1;
  });


Route::get('/test1',function(){
    return view('test');
});

Route::get('/test2',function(){
    return view('test-child');
});

Route::get('/test3',function(){
    return view('test-newChild');
});

*/
