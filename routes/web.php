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

// Home
Route::get('/', 'Index');

// Requests
Route::prefix('request')->name('request.')->group(function () {
    Route::get('list', 'Requests@index')
        ->name('list');
        
    Route::get('approved', 'Requests@approvedList')
        ->name('approved');
    
    Route::get('create', 'Requests@create')
        ->name('create');
});

// Accounts
Route::prefix('account')->name('account.')->group(function () {
    Route::get('list', 'AccountApprovers@index')
        ->name('list');
    
    Route::get('create', 'AccountApprovers@create')
        ->name('create');
        
    Route::get('delete', 'AccountApprovers@delete')
        ->name('delete');
});
    
// Delegates
Route::prefix('delegate')->name('delegate.')->group(function () {
    Route::get('list', 'Delegate@index')
        ->name('list');
    
    Route::get('create', 'Delegate@create')
        ->name('create');
        
    Route::get('delete', 'Delegate@delete')
        ->name('delete');
    
    Route::get('my', 'Delegate@my')
        ->name('my');
});

// Competencies
Route::prefix('competency')->name('competency.')->group(function () {
    Route::get('list', 'CompetencyApprovers@index')
        ->name('list');
    
    Route::get('create', 'CompetencyApprovers@create')
        ->name('create');
        
    Route::get('delete', 'CompetencyApprovers@delete')
        ->name('delete');
});

// Logs
Route::prefix('log')->name('log.')->group(function () {
    Route::get('list', 'Log@index')
        ->name('list');
});

// Access
Route::prefix('access')->name('access.')->group(function () {
    Route::get('my', 'Index@access')
    ->name('my');
});

// Legacy links
Route::redirect('/index.html', '/');

Route::redirect('/p_request.php', function () {
    route('request.create');
});
Route::redirect('/p_manageNew.php', route('request.list'));
Route::redirect('/p_readerOnly.php', route('request.list'));
Route::redirect('/p_manage.php', route('request.list'));

Route::get('/p_admin.php', 'Index@admin');
Route::get('/p_account.php', route('account.list'));
Route::get('/p_competency.php', route('competency.list'));
Route::get('/p_showDelegates.php', route('delegate.list'));
Route::get('/p_log.php', route('log.list'));

Route::get('/p_delegate.php', route('delegate.list'));
Route::get('/p_myOatAccess.php', route('access.list'));