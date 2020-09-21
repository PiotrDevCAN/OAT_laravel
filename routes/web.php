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

// OvertimeRequests
Route::prefix('request')->name('request.')->group(function () {
    Route::match(['get', 'post'], 'list', 'OvertimeRequests@index')
        ->name('list');
        
    Route::get('approved', 'OvertimeRequests@approvedList')
        ->name('approved');
    
    Route::get('create', 'OvertimeRequests@create')
        ->name('create');
    
    Route::get('update/{ref}', 'OvertimeRequests@update')
        ->name('update');

    Route::get('delete/{ref}', 'OvertimeRequests@delete')
        ->name('delete');
        
    Route::get('approve/{ref}/cat/{lvl?}/status/{status?}/via/{via?}', 'OvertimeRequests@approve')
        ->name('approve');
        
    Route::get('reject/{ref}/cat/{lvl?}/status/{status?}/via/{via?}', 'OvertimeRequests@reject')
        ->name('reject');
});

// Accounts
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Accounts
    Route::prefix('account')->name('account.')->group(function () {
        Route::match(['get', 'post'], 'list', 'Accounts@index')
            ->name('list');
        
        Route::get('create', 'Accounts@create')
            ->name('create');
        
        Route::get('update/{ref}', 'Accounts@update')
            ->name('update');
        
        Route::get('delete/{ref}', 'Accounts@delete')
            ->name('delete');
    });
    
    // Delegates
    Route::prefix('delegate')->name('delegate.')->group(function () {
        Route::match(['get', 'post'], 'list', 'Delegates@index')
            ->name('list');
        
        Route::get('create', 'Delegates@create')
            ->name('create');
            
        Route::get('update/{ref}', 'Delegates@update')
            ->name('update');
            
        Route::get('delete/{ref}', 'Delegates@delete')
            ->name('delete');
        
        Route::get('my', 'Delegates@my')
            ->name('my');
    });
    
    // Competencies
    Route::prefix('competency')->name('competency.')->group(function () {
        Route::match(['get', 'post'], 'list', 'Competencies@index')
            ->name('list');
        
        Route::get('create', 'Competencies@create')
            ->name('create');
        
        Route::get('update/{ref}', 'Competencies@update')
            ->name('update');
            
        Route::get('delete/{ref}', 'Competencies@delete')
            ->name('delete');
    });
    
    // Logs
    Route::prefix('log')->name('log.')->group(function () {
        Route::match(['get', 'post'], 'list', 'Logs@index')
            ->name('list');
    });
    
});

// Access
Route::prefix('access')->name('access.')->group(function () {
    Route::get('my', 'Index@access')
    ->name('my');
});

// Legacy links
Route::redirect('/index.html', '/');
Route::get('/p_admin.php', 'Index@admin');

Route::get('/p_request.php', function () {
    return redirect()->route('request.create');
});
Route::get('/p_manage.php', function () {
    return redirect()->route('request.list');
});
Route::get('/p_manageNew.php', function () {
    return redirect()->route('request.list');
});
Route::get('/p_readerOnly.php', function () {
    return redirect()->route('request.approved');
});
Route::get('/p_account.php', function () {
    return redirect()->route('admin.account.list');
});
Route::get('/p_competency.php', function () {
    return redirect()->route('admin.competency.list');
});
Route::get('/p_showDelegates.php', function () {
    return redirect()->route('admin.delegate.list');
});
Route::get('/p_log.php', function () {
    return redirect()->route('admin.log.list');
});
Route::get('/p_delegate.php', function () {
    return redirect()->route('admin.delegate.my');
});
Route::get('/p_myOatAccess.php', function () {
    return redirect()->route('access.my');
});