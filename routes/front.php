<?php

Route::get('/', 'HomeController@index');
Route::get('/originals', 'OriginalsController@index');
Route::get('tag/{tagSlug}', 'TaggedPostsController@index');

Route::get('{postSlug}', 'PostsController@detail');
