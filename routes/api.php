<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Overtime Requests
Route::prefix('request')->name('request.')->group(function () {
    Route::get('store', 'OvertimeRequests@store')
        ->name('store');

    Route::get('show/{ref}', 'OvertimeRequests@show')
        ->name('show');

    Route::get('update/{ref}', 'OvertimeRequests@update')
        ->name('update');

    Route::get('destroy/{ref}', 'OvertimeRequests@destroy')
        ->name('destroy');

    Route::get('approve/{ref}/cat/{lvl?}/status/{status?}/via/{via?}', 'OvertimeRequests@approve')
        ->name('approve');

    Route::get('reject/{ref}/cat/{lvl?}/status/{status?}/via/{via?}', 'OvertimeRequests@reject')
        ->name('reject');
});

// Accounts
Route::prefix('account')->name('account.')->group(function () {
    Route::get('store', 'Accounts@store')
        ->name('store');
        
        Route::get('show/{ref}', 'Accounts@show')
        ->name('show');
        
    Route::get('update/{ref}', 'Accounts@update')
        ->name('update');

    Route::get('destroy/{ref}', 'Accounts@destroy')
        ->name('destroy');
});

// Delegates
Route::prefix('delegate')->name('delegate.')->group(function () {
    Route::get('store', 'Delegates@store')
        ->name('store');
        
    Route::get('show/{ref}', 'Delegates@show')
        ->name('show');
        
    Route::get('update/{ref}', 'Delegates@update')
        ->name('update');

    Route::get('destroy/{ref}', 'Delegates@destroy')
        ->name('destroy');
});

// Competencies
Route::prefix('competency')->name('competency.')->group(function () {
    Route::get('store', 'Competencies@store')
        ->name('store');
        
    Route::get('show/{ref}', 'Competencies@show')
        ->name('show');
        
    Route::get('update/{ref}', 'Competencies@update')
        ->name('update');

    Route::get('destroy/{ref}', 'Competencies@destroy')
        ->name('destroy');
});