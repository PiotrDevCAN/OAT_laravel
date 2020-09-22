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

// Overtime Requests
Route::prefix('request')->name('request.')->group(function () {
    Route::match(['get', 'post'], 'list', 'OvertimeRequests@index')
        ->name('list');
    
    Route::get('approved', 'OvertimeRequests@approved')
        ->name('approved');
    
    // Show the form for creating a new resource.
    Route::get('create', 'OvertimeRequests@create')
        ->name('create');
    
    // Store a newly created resource in storage.
    Route::get('store', 'OvertimeRequests@store')
        ->name('store');
    
    // Display the specified resource.
    Route::get('show', 'OvertimeRequests@show')
        ->name('show');
    
    // Show the form for editing the specified resource.
    Route::get('edit', 'OvertimeRequests@edit')
        ->name('edit');
    
    // Update the specified resource in storage.
    Route::get('update/{ref}', 'OvertimeRequests@update')
        ->name('update');
    
    // Remove the specified resource from storage.
    Route::get('destroy/{ref}', 'OvertimeRequests@destroy')
        ->name('destroy');
        
//     Route::get('approve/{ref}/cat/{lvl?}/status/{status?}/via/{via?}', 'OvertimeRequests@approve')
//         ->name('approve');
        
//     Route::get('reject/{ref}/cat/{lvl?}/status/{status?}/via/{via?}', 'OvertimeRequests@reject')
//         ->name('reject');
});

// Accounts
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Accounts
    Route::prefix('account')->name('account.')->group(function () {
        Route::match(['get', 'post'], 'list', 'Accounts@index')
            ->name('list');
        
        Route::get('show', 'Accounts@show')
            ->name('show');
        
//         Route::get('update/{ref}', 'Accounts@update')
//             ->name('update');
        
//         Route::get('delete/{ref}', 'Accounts@delete')
//             ->name('delete');
    });
    
    // Delegates
    Route::prefix('delegate')->name('delegate.')->group(function () {
        Route::match(['get', 'post'], 'list', 'Delegates@index')
            ->name('list');
        
        Route::get('show', 'Delegates@show')
            ->name('show');
            
        Route::get('my', 'Delegates@my')
            ->name('my');
            
//         Route::get('update/{ref}', 'Delegates@update')
//             ->name('update');
            
//         Route::get('delete/{ref}', 'Delegates@delete')
//             ->name('delete');
    });
    
    // Competencies
    Route::prefix('competency')->name('competency.')->group(function () {
        Route::match(['get', 'post'], 'list', 'Competencies@index')
            ->name('list');
        
        Route::get('show', 'Competencies@show')
            ->name('show');
        
//         Route::get('update/{ref}', 'Competencies@update')
//             ->name('update');
            
//         Route::get('delete/{ref}', 'Competencies@delete')
//             ->name('delete');
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