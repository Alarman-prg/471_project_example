<?php
use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
return view('welcome');
});
*/
Route::get('/', ['uses' => '\App\Http\Controllers\EventController@index']);
Route::get('/events/{event_id}', ['uses' => '\App\Http\Controllers\EventController@get']);
Route::post('/events/{event_id}', ['uses' => '\App\Http\Controllers\EventController@signup']);
Route::get('/admin/events', ['uses' => '\App\Http\Controllers\EventController@admin_index']);
Route::post('/admin/events', ['uses' => '\App\Http\Controllers\EventController@admin_event_add']);
/*
Route::get('/events', ['uses' => '\App\Http\Controllers\EventController@index']);
Route::get('/events/{event_id}/attendees', ['uses' => '\App\Http\Controllers\
EventController@attendees']);
*/
