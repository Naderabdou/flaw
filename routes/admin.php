<?php

use App\Http\Controllers\FirebaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Monarobase\CountryList\CountryListFacade;

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

Route::get('dd', function () {
    return view('dashboard.imbalances.viecw');
});

    Route::resource('/splash','SplashController');

Route::get('/test', 'SplashController@test');


Route::get('/redirect/{service}','SocialController@redirect');
Route::get('/callback/{service}','SocialController@callback');
Route::get('firebase-phone-authentication', [FirebaseController::class, 'index']);

Route::group(['middleware'=>'auth'], function() {
    Route::get('dashboard','DashboardController@index')->name('admin');
    Route::resource('imbalances','ImbalancesController');
    Route::get('data/{id}/{url?}','ImbalancesController@data')->name('data');
    Route::get('all/{id}','ImbalancesController@all')->name('All');
    Route::get('view/{id}','ImbalancesController@view')->name('view');
    Route::post('status/{id}','ImbalancesController@status')->name('status');




    Route::resource('city','CityController');
    Route::resource('/Fault_side','Fault_sideController');
    Route::resource('/Causes_glitch','Causes_glitchController');


    Route::resource('blog','BlogController');
    Route::get('read_more/{id}','BlogController@read')->name('read_more');


    Route::resource('comments','CommentsController');
    Route::resource('commentsBlog','CommentBlogController');

    // Route::resource('replies','RepliesController');
    Route::post('replay','RepliesController@replay')->name('replay.store');
    Route::put('replay/show/{id}','RepliesController@show')->name('replay.show');
    Route::get('replay/delete/{id}','RepliesController@delete')->name('replay.delete');
    Route::resource('rate','RateController');


    Route::post('/replies/ajaxDelete','RepliesController@ajaxDelete');

    Route::resource('message','MessageController');
    Route::post('message/store-message','MessageController@send')->name('send');


});



require __DIR__.'/auth.php';
