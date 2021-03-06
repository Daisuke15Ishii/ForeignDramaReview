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

Route::get('/', 'IndexController@index');

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

Route::group(['prefix' => 'register'], function(){
    Route::post('/complete', function () {
        return view('/user/register/complete');
    });
});

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'about'], function(){
    Route::get('/', 'about\AboutController@index');
    Route::get('/info', 'about\AboutController@info');
    Route::get('/manual', 'about\AboutController@manual');
    Route::get('/terms-of-service', 'about\AboutController@terms_of_service');
    Route::get('/contact', 'about\AboutController@contactcreate');
    
    Route::post('/contact', 'about\AboutController@contactsend')->name('contact_send');
    Route::get('/contact/result', 'about\AboutController@contactresult')->name('contact_result');
//    Route::post('/contact/result', 'about\AboutController@contactupdate')->name('contact_update');    
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
    Route::get('/orderresult', 'search\SearchController@orderresult')->name('search_result_order');
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
    Route::get('/following', 'user\mypage\MypageController@followingindex')->name('following_index');
    Route::get('/followed', 'user\mypage\MypageController@followedindex')->name('followed_index');

    // drama/~のルーティングをdrama/{categorize}より上に記述しないと、{categorize}でルーティングされてエラーになるため注意
    Route::get('/drama/favorite', 'user\mypage\MypageDramaController@indexfavorite')->name("my_favorite_drama");
    Route::post('/drama/my_favorite_set', 'user\mypage\MypageDramaController@setfavorite')->name("my_favorite_set");
    Route::post('/drama/my_drama_set', 'user\mypage\MypageDramaController@setdrama')->name("my_drama_set");
    Route::get('/drama/review_delete', 'user\mypage\MypageDramaController@delete')->name("review_delete");
    Route::get('/drama/{categorize}', 'user\mypage\MypageDramaController@index')->name("my_drama");
});

//['prefix' => 'user/mypage']を['prefix' => 'user/{userID}']より上に記述する必要あり
Route::group(['prefix' => 'user/{userID}'], function(){
    Route::get('/', 'user\userID\OthersController@index')->name('others_home');
    Route::get('/like', 'user\userID\OthersController@likeindex')->name('others_like_index');
    Route::get('/following', 'user\userID\OthersController@followingindex')->name('others_following_index');
    Route::get('/followed', 'user\userID\OthersController@followedindex')->name('others_followed_index');
    Route::get('/drama/favorite', 'user\userID\OthersDramaController@indexfavorite')->name("others_favorite_drama");
    Route::get('/drama/{categorize}', 'user\userID\OthersDramaController@index')->name("others_drama");
});
Route::group(['prefix' => 'user/{userID}', 'middleware' => 'auth'], function(){
    //OthersControllerに記述されているが、フォローにはログインが必要なので上記とはgroupを分けている
    Route::post('/follow', 'user\userID\OthersController@follow')->name('others_follow');
});

Route::group(['prefix' => 'ranking'], function(){
    Route::get('/', 'ranking\RankingController@index')->name("ranking_index");
});
