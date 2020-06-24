<?php
Route::get('/', 'TemperatuurController@index');
Route::get('overzicht', 'TemperatuurController@detail');
Route::get('contact', 'TemperatuurController@contact');
Route::post('nieuwsbrief', 'TemperatuurController@nieuwsbrief');
