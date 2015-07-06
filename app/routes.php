<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(["before" => "guest"], function() {
    Route::any("/login", [
        "as" => "login",
        "uses" => "AuthenticationController@getLogin"
    ]);

    Route::post("/login", "AuthenticationController@postLogin");
});

Route::group(["before" => "auth"], function() {
    Route::any("/", [
        "as" => "index",
        "uses" => "UserController@index"
    ]);
    Route::any("/logout", [
        "as" => "logout",
        "uses" => "AuthenticationController@getLogout"
    ]);
    Route::any("/borrowers/addloan/{id}", [
    "as" => "addloan",
    "uses" => "BorrowerController@addLoan"
            ]);
    Route::any("/borrowers/addloanhelper/{id}", [
    "as" => "addloanhelper",
    "uses" => "BorrowerController@addLoanHelper"
            ]);

    Route::resource('borrowers', 'BorrowerController');
   
   
});
Route::post('borrowers/update/{id}', 'BorrowerController@update');
//Route::post('/update/{id}', 'MaterialController@update');