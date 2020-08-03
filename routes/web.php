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

//postは不要。画面確認用
Route::post('/', function () {
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

//['prefix' => 'drama/review']を['prefix' => 'drama/{drama_id}']より上に記述する必要あり
Route::group(['prefix' => 'drama/review'], function(){
    Route::get('/', 'drama\review\DramaReviewController@index')->name('review_index');
});

Route::group(['prefix' => 'drama/{drama_id}'], function(){
    Route::get('/', 'drama\dramaID\DramaIDController@index')->name('dramaID_index');
    Route::post('/', 'drama\dramaID\review\reviewID\DramaIDReviewReviewIDController@like')->name("review_like");
    //followは仮でここに記述(後程、違うURLおよび違うコントローラに変更予定)
    Route::post('/follow', 'drama\dramaID\review\reviewID\DramaIDReviewReviewIDController@follow')->name("review_follow");
    Route::get('/review/{review_id}', 'drama\dramaID\review\reviewID\DramaIDReviewReviewIDController@index')->name("reviewID_index");
});


Route::group(['prefix' => 'search'], function(){
    Route::get('/', 'search\SearchController@index');
    Route::get('/detailresult', 'search\SearchController@detailresult')->name('search_result');
    Route::get('/result', 'search\SearchController@result');
});


Route::group(['prefix' => 'user/userID'], function(){
    Route::get('/', function () {
        return view('/user/userID/index');
    });
    Route::post('/', function () {
        return view('/user/userID/index');
    });
});

Route::group(['prefix' => 'drama/{drama_id}/review', 'middleware' => 'auth'], function(){
    Route::get('/', 'drama\dramaID\review\DramaIDReviewController@add')->name('review_add');
    Route::post('/', 'drama\dramaID\review\DramaIDReviewController@create')->name('review_create');
    Route::get('/{review_id}/edit', 'drama\dramaID\review\reviewID\DramaIDReviewReviewIDController@edit')->name("review_edit");
    Route::post('/{review_id}/edit', 'drama\dramaID\review\reviewID\DramaIDReviewReviewIDController@update')->name("review_edit");
});

Route::group(['prefix' => 'user/mypage', 'middleware' => 'auth'], function(){
    Route::get('/profile/edit', 'user\mypage\MypageProfileController@edit')->name("profile_edit");
    Route::post('/profile/edit', 'user\mypage\MypageProfileController@update')->name("profile_update");
    Route::get('/setting/edit', 'user\mypage\MypageSettingController@edit')->name("setting_edit");
    Route::post('/setting/edit', 'user\mypage\MypageSettingController@update')->name("setting_update");
    
    Route::get('/', 'user\mypage\MypageController@index');
    Route::get('/like', 'user\mypage\MypageController@likeindex')->name('like_index');
    
    // drama/favoriteのルーティングを{categorize}より上に記述しないと、{categorize}でルーティングされてエラーになるため注意
    Route::get('/drama/favorite', 'user\mypage\MypageDramaController@indexfavorite')->name("my_favorite_drama");
    Route::get('/drama/{categorize}', 'user\mypage\MypageDramaController@index')->name("my_drama");
    Route::post('/drama/my_favorite_set', 'user\mypage\MypageDramaController@setfavorite')->name("my_favorite_set");
    Route::post('/drama/my_drama_set', 'user\mypage\MypageDramaController@setdrama')->name("my_drama_set");
    Route::get('/drama/review_delete', 'user\mypage\MypageDramaController@delete')->name("review_delete");
});
