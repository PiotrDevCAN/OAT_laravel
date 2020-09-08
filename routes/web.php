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

// Legacy links
Route::get('/', 'Index');
Route::get('/p_request.php', 'Requests@create');

// Route::get('/p_manage.php', 'Requests@index');
Route::get('/p_manageNew.php', 'Requests@index')->name('list');
Route::get('/p_readerOnly.php', 'Requests@readOnlyIndex')->name('readOnlyList');

Route::get('/p_manage.php', function() {
    return redirect()->route('list');
});
// Route::get('/p_readerOnly.php', function() {
//    return redirect()->route('list'); 
// });


// Route::permanentRedirect('/p_readerOnly.php', '/p_manageNew.php');
// Route::permanentRedirect('/p_manage.php', '/p_manageNew.php');

// ADMIN
Route::get('/p_account.php', 'AccountApprovers@index');
Route::get('/p_competency.php', 'CompetencyApprovers@index');
Route::get('/p_showDelegates.php', 'Delegate@index');
Route::get('/p_log.php', 'Log@index');
Route::get('/p_delegate.php', 'Delegate@delegate');
Route::get('/p_myOatAccess.php', 'Index@access');
