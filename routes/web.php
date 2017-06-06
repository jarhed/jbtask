<?php

Route::get('/', function () {
    return view('directory');
});

Route::get('/company/categorize/{category}/{subcategory?}', 'CompanyController@categorize');
Route::get('/company/search/{searchTerm?}', 'CompanyController@search');