<?php

use App\Http\Controllers\AdminCollectionController;
use App\Http\Controllers\AdminConfigController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminNotificationController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BranchHeadController;
use App\Http\Controllers\BranchHeadDashboardController;
use App\Http\Controllers\BranchHeadNotificationController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ModifyRequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // auth()->logout();
    return view('auth.login');
});


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        $role = auth()->user()->getRoleNames()->first();
        if ($role == 'admin') {
            return redirect()->route('admin.dashboard.index');
        } else if ($role == 'branch-head') {
            return redirect()->route('branch-head.dashboard.index');
        }
    })->name('home');
});



Route::prefix('/branch-head/')->as('branch-head.')->middleware('role:branch-head')->group(function () {
    Route::get('/notification/act/{act_request}', [BranchHeadNotificationController::class, 'actRequest'])->name('notification.act_request');
    Route::get('/notification/pending', [BranchHeadNotificationController::class, 'getPending'])->name('notification.pending');
    Route::put('/collection/update_request/{collection_id}/{id}', [CollectionController::class, 'updateRequest'])->name('collection.update_request');
    Route::resource('/dashboard', BranchHeadDashboardController::class)->names('dashboard');
    Route::resource('/collection', CollectionController::class)->names('collection');
    Route::resource('/modify-request', ModifyRequestController::class)->names('modify-request');
    Route::resource('/cashier', CashierController::class)->names('cashier');
});

Route::prefix('/admin/')->as('admin.')->middleware('role:admin')->group(function () {

    Route::put('/notification/act/approve/{act_request}', [AdminNotificationController::class, 'actRequestApprove'])->name('notification.act_request.approve');
    Route::put('/notification/act/decline/{act_request}', [AdminNotificationController::class, 'actRequestDecline'])->name('notification.act_request.decline');
    Route::get('/notification/act/{act_request}', [AdminNotificationController::class, 'actRequest'])->name('notification.act_request');
    Route::get('/notification/pending', [AdminNotificationController::class, 'getPending'])->name('notification.pending');
    Route::resource('/dashboard', AdminDashboardController::class)->names('dashboard');
    Route::resource('/branch', BranchController::class)->names('branch');
    Route::resource('/branch-head', BranchHeadController::class)->names('branch-head');
    Route::put('/config/update_config', [AdminConfigController::class, 'updateConfig'])->name('config.update_config');
    Route::resource('/config', AdminConfigController::class)->names('config');
    Route::get('/collection/data', [AdminCollectionController::class, 'data'])->name('collection.data');
    Route::resource('/modify', ModifyRequestController::class)->names('modify');
    Route::resource('/collection', AdminCollectionController::class)->names('collection');
});
