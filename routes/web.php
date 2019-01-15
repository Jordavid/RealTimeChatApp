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

Route::get('/', 'ConversationController@index');
Route::get('/chat', 'ChatsController@chat');
Route::post('/send', 'chatsController@send');
Route::get('/conversation', 'ConversationController@index')->name('conversation');
Route::get('/conversation/{friend_id}', 'ConversationController@show')->name('conversation.show');
Route::post('/conversation/getConversation/{friend_id}', 'ConversationController@getConversation');
Route::post('/conversation/sendConversation', 'ConversationController@sendConversation');
Auth::routes();

