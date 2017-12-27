<?php






Route::resource('/edit', 'EditController@index');
Route::resource('/idprint', 'IdPrintController');

Route::get('/print', function () {
    return view('pettycash.print');
});





Route::get('/edit2', function () {
    return view('pettycash.edit2');
});


Route::get('forma/{id}/print', 'PrintController@printview');

Route::post('/openingamount','OpeningAmountController@create');


Route::resource('/request','RequestController');
Route::get('/request','RequestController@index');
Route::post('/request','RequestController@store');

Route::resource('/index','IndexController');

Route::resource('/pettycasha', 'PettyCashFormAController');



Route::resource('/pettycashb', 'PettyCashFormbController');
//Route::get('/pettycashb', 'PettyCashFormbController@index');

//Route::get('/pettycashc/{', 'PettyCashFormcController@index');
Route::resource('/pettycashc', 'PettyCashFormcController');



Route::get('/logout','LoginController@logout');

Route::get('/','LoginController@index');
Route::get('/login','LoginController@index');
Route::post('/login','LoginController@store');
Route::get('/register','RegisterController@index');
Route::post('/register','RegisterController@store');



