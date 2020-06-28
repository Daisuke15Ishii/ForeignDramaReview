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

Route::get('/', function () {
    return view('/index');
});


//下記がauth関連のルーティングのデフォルト
Auth::routes();
//上記のauth関連のルーティングを下記のように変更予定(デフォルトでuser/を追加)

/*
// Authentication Routes...
Route::get('user/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('user/login', 'Auth\LoginController@login');
Route::post('user/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('user/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('user/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('user/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('user/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('user/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('user/password/reset', 'Auth\ResetPasswordController@reset');
*/

Route::get('/home', 'HomeController@index')->name('home');


/*　これより下の記述は、画面表示のテスト確認用　*/
Route::group(['prefix' => 'about'], function(){
    Route::get('/', function () {
        return view('/about/index');
    });
    Route::get('/info', function () {
        return view('/about/info/index');
    });
    Route::get('/terms-of-service', function () {
        return view('/about/terms-of-service/index');
    });
    Route::get('/contact', function () {
        return view('/about/contact/create');
    });
    Route::post('/contact', function () {
        return view('/about/contact/thanks');
    });
});

Route::group(['prefix' => 'user/register'], function(){
    Route::get('/complete', function () {
        return view('/user/register/complete');
    });
});

Route::group(['prefix' => 'drama/dramaID'], function(){
    Route::get('/', function () {
        return view('/drama/dramaID/index');
    });
    Route::post('/', function () {
        return view('/drama/dramaID/index');
    });
    Route::get('/review/reviewID', function () {
        return view('/drama/dramaID/review/reviewID/index');
    });
    Route::post('/review/reviewID', function () {
        return view('/drama/dramaID/review/reviewID/index');
    });
});


Route::group(['prefix' => 'search'], function(){
    Route::get('/', function () {
        return view('/search/index');
    });
    Route::post('/', function () {
        return view('/search//index');
    });
    Route::get('/result', function () {
        return view('/search/result/index');
    });
    Route::post('/result', function () {
        return view('/search/result/index');
    });
});

Route::group(['prefix' => 'drama/dramaID/review', 'middleware' => 'auth'], function(){
    Route::get('/', function () {
        return view('/drama/dramaID/review/create');
    });
    Route::post('/', function () {
        return view('/drama/dramaID/review/create');
    });
    Route::get('/review/reviewID/edit', function () {
        return view('/drama/dramaID/review/reviewID/edit');
    });
    Route::post('/review/reviewID', function () {
        return view('/drama/dramaID/review/reviewID/index');
    });
});
