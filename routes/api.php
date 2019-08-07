<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::prefix( 'v1' )->namespace( 'V1' )->group( function () {

    // Auth
    Route::get( 'auth', 'AuthController@auth' );

    // Signup
    Route::prefix( 'signup' )->namespace( 'Signup' )->group( function () {
        Route::post( 'register', 'RegisterController@register' );
        Route::post( 'register/{social}', 'RegisterController@social' );
        Route::post( 'verify/email', 'VerifyController@verify' )->name( 'verify.email' );
        Route::post( 'verify/resend', 'VerifyController@resend' );
    } );

    // Reset Passwd
    Route::post( 'reset', 'ResetController@reset' );
    Route::post( 'reset/verify', 'ResetController@verify' )->name( 'verify.reset' );
    Route::post( 'reset/resend', 'ResetController@resend' );

    // me
    Route::prefix( 'me' )->namespace( 'Me' )->middleware( 'auth:oauth' )->group( function () {

        Route::get( '/', 'ProfileController@index' );
        Route::resource( 'profile', 'ProfileController' )->only( ['show', 'update', 'destroy'] );

    } );

    // Test
    Route::get( '/client', function () {} )->middleware( 'client' );

} );