<?php
Route::redirect('/', '/admin/posts');

Route::resource('posts', 'PostsController');
