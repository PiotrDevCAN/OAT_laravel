<?php

use Illuminate\Support\Facades\Route;
use App\Models\OvertimeRequest;
use App\Http\Controllers\Index;
use App\Http\Controllers\Login;
use App\Http\Controllers\OvertimeRequests;
use App\Http\Controllers\Accounts;
use App\Http\Controllers\Delegates;
use App\Http\Controllers\Competencies;
use App\Http\Controllers\Locations;

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
Route::get('/', [Index::class, 'index'])
    ->name('home');

Route::get('/logout', [Login::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');
    
Route::name('auth.')
    ->middleware('guest')
    ->group(function () {
        Route::get('/login', [Login::class, 'showLoginForm'])
            ->name('login');
        
        Route::get('/loginCancel', [Login::class, 'cancel'])
            ->name('loginCancel');
        
        Route::post('/authenticate', [Login::class, 'authenticate'])
            ->name('post.authenticate');
        
        Route::get('/authenticate', function () {
            return redirect()->route('auth.login');
        })
            ->name('get.authenticate');
    });

// Overtime Requests
Route::prefix('request')
    ->middleware('auth')
    ->name('request.')
    ->group(function () {
        Route::match(['get', 'post'], 'list', [OvertimeRequests::class, 'index'])
            ->name('list');
        
        Route::match(['get', 'post'], 'approved', [OvertimeRequests::class, 'approved'])
            ->name('approved');
        
        // Show the form for creating a new resource.
        Route::get('create', [OvertimeRequests::class, 'create'])
            ->name('create');
        
        // Show the form for editing the specified resource.
        Route::get('edit/{overtimeRequest}', [OvertimeRequests::class, 'edit'])
            ->name('edit');
        
        // Show the form for review the specified resource.
        Route::get('show/{overtimeRequest}', [OvertimeRequests::class, 'show'])
            ->name('show');
        
        // Mailables preview
        Route::get('retrieved/{overtimeRequest}/mailable', function (OvertimeRequest $overtimeRequest) {
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
        
        Route::get('flowChanged/{overtimeRequest}/mailable', function (OvertimeRequest $overtimeRequest) {
                return new App\Mail\Request\OvertimeRequestFlowChanged($overtimeRequest);
            })
            ->name('flowChangedMailable');
    });
    
// Admin
Route::prefix('admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {

        // Info page
        Route::get('info', [Index::class, 'admin'])
            ->name('info');
        
        // Accounts
        Route::prefix('account')->name('account.')->group(function () {
            Route::match(['get', 'post'], 'list', [Accounts::class, 'index'])
                ->name('list');
                
            // Show the form for creating a new resource.
            Route::get('create', [Accounts::class, 'create'])
                ->name('create');
            
            // Show the form for editing the specified resource.
            Route::get('edit/{account_name}/{location}', [Accounts::class, 'edit'])
                ->name('edit');
        
        });
        
        // Delegates
        Route::prefix('delegate')->name('delegate.')->group(function () {
            Route::match(['get', 'post'], 'list', [Delegates::class, 'index'])
                ->name('list');
            
            // Show the form for creating a new resource.
            Route::get('create', [Delegates::class, 'create'])
                ->name('create');
            
            // Show the form for editing the specified resource.
//             Route::get('edit/{user_intranet}/{delegate_intranet}', function (Delegate $delegate) {
//                 return (new Delegates())->edit($delegate);
//             })
//             ->name('edit');
            
            Route::get('edit/{user_intranet}/{delegate_intranet}', [Delegates::class, 'edit'])
                ->name('edit');
                
            Route::get('my/list', [Delegates::class, 'myList'])
                ->name('my.list');
            
            Route::get('my/create', [Delegates::class, 'myCreate'])
                ->name('my.create');
        });
        
        // Competencies
        Route::prefix('competency')->name('competency.')->group(function () {
            Route::match(['get', 'post'], 'list', [Competencies::class, 'index'])
                ->name('list');
            
            // Show the form for creating a new resource.
            Route::get('create', [Competencies::class, 'create'])
                ->name('create');
            
            // Show the form for editing the specified resource.
            Route::get('edit/{competency_name}/{approver}', [Competencies::class, 'edit'])
                ->name('edit');
        });
        
        // Locations
        Route::prefix('location')->name('location.')->group(function () {
            Route::match(['get', 'post'], 'list', [Locations::class, 'index'])
                ->name('list');
            
            // Show the form for creating a new resource.
            Route::get('create', [Locations::class, 'create'])
                ->name('create');
            
//             Show the form for editing the specified resource.
//             Route::get('edit/{user_intranet}/{location_intranet}', function (location $location) {
//                 return (new locations())->edit($location);
//             })
//             ->name('edit');
            
            Route::get('edit/{user_intranet}/{location_intranet}', [Locations::class, 'edit'])
                ->name('edit');
            });
            
        // Logs
        Route::prefix('log')->name('log.')->group(function () {
            Route::match(['get', 'post'], 'list', 'Logs@index')
                ->name('list');
        });
        
    });

// Access
Route::prefix('access')
    ->middleware('auth')
    ->name('access.')
    ->group(function () {
        Route::get('my', [Index::class, 'access'])
            ->name('my');
    });

// Legacy links
Route::get('/index.html', function () {
    return redirect()->route('home');
});
Route::get('/p_admin.php', function () {
    return redirect()->route('admin.info');
});
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