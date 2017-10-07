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


//Utility
Route::get('/','UtilityController@Home')->name('home');
Route::get('/about','UtilityController@About')->name('about');
Route::get('/contact','UtilityController@Contact')->name('contact');



//Account
Route::get('/register','AccountController@Register')->name('register');
Route::get('/register/referral/{r_link}','AccountController@RegisterRef')->name('register_referrals');
Route::post('/register','AccountController@RegisterPost')->name('register_post');
Route::get('/login','AccountController@Login')->name('login');
Route::post('/login','AccountController@LoginPost')->name('login_post');
Route::get('/logout','AccountController@Logout')->name('logout');


Route::group(['prefix' => '/user/','middleware' => ['auth','AuthUserCheck','UserActivated']], function ()
{
    Route::get('dashboard','UserController@Dashboard')->name('user_dashboard');
    Route::get('profile','UserController@Profile')->name('user_profile');
    Route::get('accounts','UserController@Account')->name('user_account');
    Route::get('invest','UserController@Invest')->name('user_invest');
    Route::get('withdrawals','UserController@Withdrawals')->name('user_withdrawals');
    Route::get('transactions','UserController@Transactions')->name('user_transaction');
    Route::get('referrals','UserController@Referrals')->name('user_referrals');
    Route::get('support','UserController@Support')->name('user_support');


    //Posts
    Route::post('profile/edit','UserController@ProfileEdit')->name('user_profile_post');
    Route::post('profile/password/change','UserController@ProfileEditPassword')->name('user_password_edit');
    Route::post('invest/add','UserController@InvestPost')->name('user_invest_post');
    Route::post('profile/account/upgrade','UserController@AccountUpgrade')->name('user_acct_upgrade');
});



Route::group(['prefix' => '/admin/','middleware' => ['auth','AuthAdminCheck']],function ()
{
    //User
    Route::get('dashboard','AdminController@Dashboard')->name('admin_dashboard');
    Route::get('user/view/{id}','Admincontroller@UserView')->name('admin_user_view');
    Route::post('user/profile/edit/{id}','AdminController@UserEdit')->name('admin_user_edit');


    //Trade
    Route::get('trade','AdminController@Trade')->name('admin_trade');
    Route::get('trade/action/{id}/{a_id}','AdminController@TradeAction')->name('admin_trade_action');


    //Utilities
    Route::get('utility','AdminController@Util')->name('admin_utils');
    Route::post('util/post/update','AdminController@UtilPost')->name('admin_update_util');


    //Transaction
    Route::get('transaction','AdminController@Transaction')->name('admin_trans');


    //Account
    Route::get('account','AdminController@Account')->name('admin_account');
    Route::get('account/update/{id}','AdminController@AccountUpdate')->name('admin_acc_up');




});

