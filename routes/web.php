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

Route::group(['namespace' => 'Frontend'], function () {
    Route::any('/', 'ApplicationController@index')->name('index');
    Route::any('aboutus', 'ApplicationController@aboutus')->name('aboutus');

    Route::any('my-account', 'UserController@myaccount')->name('my-account');
    Route::any('login', 'UserController@login')->name('login');
    Route::any('user-register', 'UserRegisterController@register')->name('user-register');
    Route::any('user-logout', 'UserController@logout')->name('user-logout');


    Route::any('pay', 'ApplicationController@pay');

    Route::any('slider-details/{criteria?}', 'ApplicationController@sliderDetails')->name('slider-details');

    Route::any('product-more/{criteria?}', 'ApplicationController@ProductMore')->name('product-more');

    Route::any('product-details/{criteria?}', 'ApplicationController@productDetails')->name('product-details');



    Route::any('product-by-category/{category?}', 'ApplicationController@ProductByCategory')->name('product-by-category');
    Route::any('product-by-category1/{category?}', 'ApplicationController@ProductByCategory1')->name('product-by-category1');

    Route::any('search-product/{criteria?}', 'ApplicationController@searchData')->name('search-product');
    Route::any('search-product-details/{criteria?}', 'ApplicationController@searchDataDetails')->name('search-product-details');


    Route::get('cart', 'CartController@index')->name('cart');

    Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('add-to-cart');
    //Route::get('shopping-cart', 'CartController@getCart')->name('shopping-cart');
    Route::get('reduceByOne/{id}','CartController@reduceByOne')->name('reduceByOne');
    Route::get('remove/{id}','CartController@removeItem')->name('remove');
    Route::group(['middleware' => 'auth:web'], function () {

        Route::any('checkout', 'CartController@checkout')->name('checkout');


    });


//    Route::patch('update-cart', 'ProductsController@update');
//
//    Route::delete('remove-from-cart', 'ProductsController@remove');


    Route::group(['middleware' => 'auth:web'], function () {

        Route::any('ram', function () {
            echo "ram ram";
        });

    });


});

Route::group(['namespace' => 'Backend'], function () {
    Route::any('admin-login', 'AdminLoginController@login')->name('admin-login');

});

Route::group(['namespace' => 'Backend', 'prefix' => \Illuminate\Support\Facades\Config::get('admin.name'), 'middleware' => 'auth:admin'], function () {
    Route::any('/', 'DashboardController@index')->name('admin');

    Route::group(['prefix' => 'privileges'], function () {
        Route::any('/', 'PrivilegeController@index')->name('privileges');
        Route::any('add-Privileges', 'PrivilegeController@addPrivilege')->name('add-privileges');
        Route::any('delete-privilege/{criteria?}', 'PrivilegeController@deletePrivilege')->name('delete-privilege');
        Route::any('edit-privilege/{criteria?}', 'PrivilegeController@editPrivilege')->name('edit-privilege');
        Route::any('edit-privilege-action', 'PrivilegeController@editprivilegeAction')->name('edit-privilege-action');
        Route::any('update-privilege-status', 'PrivilegeController@updatePrivilegeStatus')->name('update-privilege-status');

    });

    Route::group(['prefix' => 'users'], function () {
        Route::any('/', 'UserController@index')->name('users');
        Route::any('add-user', 'UserController@addUser')->name('add-user');
        Route::any('delete-user/{criteria?}', 'UserController@deleteUser')->name('delete-user');
        Route::any('update-user-type', 'UserController@updateType')->name('update-user-type');
        Route::any('edit-user/{criteria?}', 'UserController@editUser')->name('edit-user');
        Route::any('edit-user-action', 'UserController@edituserAction')->name('edit-user-action');
        Route::any('update-user-status', 'UserController@updateUserStatus')->name('update-user-status');
    });

    Route::group(['prefix' => 'slider'], function () {
        Route::any('/', 'SliderController@index')->name('slider');
        Route::any('add-slider', 'SliderController@addSlider')->name('add-slider');
        Route::any('update-slider-status', 'SliderController@updateSliderStatus')->name('update-slide-status');
        Route::any('delete-slider/{criteria?}', 'SliderController@deleteSlider')->name('delete-slider');


    });
    Route::group(['prefix' => 'menu'], function () {
        Route::any('/', 'MenuController@index')->name('menu');
        Route::any('add-menu', 'MenuController@addMenu')->name('add-menu');
        Route::any('delete-menu/{criteria?}', 'MenuController@deleteMenu')->name('delete-menu');
    });

    Route::group(['prefix' => 'submenu'], function () {
        Route::any('/', 'SubMenuController@index')->name('submenu');
        Route::any('add-submenu', 'SubMenuController@addSubMenu')->name('add-submenu');
        Route::any('delete-submenu/{criteria?}', 'SubMenuController@deleteSubMenu')->name('delete-submenu');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::any('/', 'CategoryController@index')->name('category');
        Route::any('add-category', 'CategoryController@addCategory')->name('add-category');
        Route::any('delete-category/{criteria?}', 'CategoryController@deleteCategory')->name('delete-category');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::any('/', 'ProductController@index')->name('product');
        Route::any('add-product', 'ProductController@addProduct')->name('add-product');
        Route::any('delete-product/{criteria?}', 'ProductController@deleteProduct')->name('delete-product');
    });

    Route::any('logout', 'AdminLoginController@logout')->name('logout');


    Route::any('customer-list','DashboardController@CustomerList')->name('customer-list');
    Route::any('order-list','DashboardController@OrderList')->name('order-list');

});
