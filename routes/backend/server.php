<?php
Route::resource('server', 'ServerManagementController');

Route::prefix('server')->group(function (){
    Route::get('/disabled', 'ServerManagementController@disabled')->name('server.disabled');
    Route::get('/deleted', 'ServerManagementController@deleted')->name('server.deleted');
    Route::get('/enable/{server}', 'ServerManagementController@enable')->name('server.enable');
    Route::get('/ssl/{server}', 'ServerManagementController@ssl')->name('server.ssl');
});

