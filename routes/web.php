<?php

use Illuminate\Support\Facades\Route;
use App\Models\OvertimeRequest;
use App\Http\Controllers\OvertimeRequests;
use App\Models\Delegate;
use App\Http\Controllers\Delegates;
use App\Models\Account;
use App\Http\Controllers\Accounts;
use App\Models\Competency;
use App\Http\Controllers\Competencies;

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
    
    Route::match(['get', 'post'], 'approved', 'OvertimeRequests@approved')
        ->name('approved');
    
    // Show the form for creating a new resource.
    Route::get('create', 'OvertimeRequests@create')
        ->name('create');
    
    // Show the form for editing the specified resource.
    Route::get('edit/{overtimeRequest}', 'OvertimeRequests@edit')
        ->name('edit');
    
    // Mailables preview
    Route::get('submitted/{overtimeRequest}/mailable', function (OvertimeRequest $overtimeRequest) {
        return new App\Mail\Request\OvertimeRequestRetrieved($overtimeRequest);
    })
        ->name('retrievedMailable');
    
    Route::get('created/{overtimeRequest}/mailable', function (OvertimeRequest $overtimeRequest) {
            return new App\Mail\Request\OvertimeRequestCreated($overtimeRequest);
        })
        ->name('createdMailable');
    
    Route::get('updated/{overtimeRequest}/mailable', function (OvertimeRequest $overtimeRequest) {
        return new App\Mail\Request\OvertimeRequestUpdated($overtimeRequest);
    })
        ->name('updatedMailable');
    
    Route::get('deleted/{overtimeRequest}/mailable', function (OvertimeRequest $overtimeRequest) {
            return new App\Mail\Request\OvertimeRequestDeleted($overtimeRequest);
        })
        ->name('deletedMailable');
    
    Route::get('approved/{overtimeRequest}/mailable', function (OvertimeRequest $overtimeRequest) {
            return new App\Mail\Request\OvertimeRequestApproved($overtimeRequest);
        })
        ->name('approvedMailable');
        
    Route::get('rejected/{overtimeRequest}/mailable', function (OvertimeRequest $overtimeRequest) {
        return new App\Mail\Request\OvertimeRequestRejected($overtimeRequest);
    })
        ->name('rejectedMailable');
});

// Accounts
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Accounts
    Route::prefix('account')->name('account.')->group(function () {
        Route::match(['get', 'post'], 'list', 'Accounts@index')
            ->name('list');
        
    // Show the form for creating a new resource.
    Route::get('create', 'Accounts@create')
        ->name('create');
    
    // Show the form for editing the specified resource.
    Route::get('edit/{account_name}/{location}', 'Accounts@edit')
        ->name('edit');

    });
    
    // Delegates
    Route::prefix('delegate')->name('delegate.')->group(function () {
        Route::match(['get', 'post'], 'list', 'Delegates@index')
            ->name('list');
        
        // Show the form for creating a new resource.
        Route::get('create', 'Delegates@create')
            ->name('create');
        
        // Show the form for editing the specified resource.
//         Route::get('edit/{user_intranet}/{delegate_intranet}', function (Delegate $delegate) {
//             return (new Delegates())->edit($delegate);
//         })
//         ->name('edit');
        
        Route::get('edit/{user_intranet}/{delegate_intranet}', 'Delegates@edit')
            ->name('edit');
            
        Route::get('my', 'Delegates@my')
            ->name('my');
    });
    
    // Competencies
    Route::prefix('competency')->name('competency.')->group(function () {
        Route::match(['get', 'post'], 'list', 'Competencies@index')
            ->name('list');
        
        // Show the form for creating a new resource.
        Route::get('create', 'Competencies@create')
            ->name('create');
        
        // Show the form for editing the specified resource.
        Route::get('edit/{competency_name}/{approver}', 'Competencies@edit')
            ->name('edit');
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

/*
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
*/