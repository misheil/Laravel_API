<?php
Route::get('/', 'TwitterController@twitterUserTimeLine');
Route::post('/back', 'TwitterController@twitterUserTimeLine');
Route::post('back', ['as'=>'post.back','uses'=>'TwitterController@twitterUserTimeLine']);
Route::post('tweet', ['as'=>'post.tweet','uses'=>'TwitterController@tweet']);
// Route::post('ShowFromDb', ['as'=>'post.tweet','uses'=>'TwitterController@tweet']);
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
//
// Route::get('/', function () {
//     return view('welcome');
// });
