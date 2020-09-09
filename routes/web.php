<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'Index');

// Requests
Route::prefix('request')->name('request.')->group(function () {
    Route::get('list', 'Requests@index')
        ->name('list');
        
    Route::get('readOnlyList', 'Requests@readOnlyIndex')
        ->name('readOnlyList');
    
    Route::get('create', 'Requests@create')
        ->name('create');
});

// Accounts
Route::prefix('account')->name('account.')->group(function () {
    Route::get('list', 'AccountApprovers@index')
    ->name('list');
    
});
    
// Delegates
Route::prefix('delegate')->name('delegate.')->group(function () {
    Route::get('list', 'Delegate@index')
    ->name('list');
    
});

// Competencies
Route::prefix('competency')->name('competency.')->group(function () {
    Route::get('list', 'CompetencyApprovers@index')
    ->name('list');
    
});

// Legacy links
Route::redirect('/index.html', '/');

// Route::redirect('/p_request.php', route('request.create'));
// Route::redirect('/p_manageNew.php', route('request.list'));
// Route::redirect('/p_readerOnly.php', route('request.list'));
// Route::redirect('/p_manage.php', route('request.list'));


// Route::get('/p_account.php', 'AccountApprovers@index');
// Route::get('/p_competency.php', 'CompetencyApprovers@index');
// Route::get('/p_showDelegates.php', 'Delegate@index');
// Route::get('/p_log.php', 'Log@index');
// Route::get('/p_delegate.php', 'Delegate@delegate');
// Route::get('/p_myOatAccess.php', 'Index@access');