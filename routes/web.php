<?php

require_once(app_path('helpers.php'));

Route::get('/', function () {
    return redirect()->route('projects.index');
});

Route::resource('projects', 'ProjectsController');

Route::post('projects/{id}/upload', 'FileController@store')->name('uploadProjectFile');
Route::get('uploads/{id}', 'FileController@show')->name('downloadProjectFile');

Route::get('files', 'FileController@index')->name('showAllProjectFiles');