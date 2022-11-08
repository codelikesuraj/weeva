<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeliveryController;

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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware('auth')->group(function () {
    /** Dashboard  */
    Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('dashboard');

    /** Orders  */
    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', [OrderController::class, 'getAllOrders'])->name('index');
        Route::get('show/{order}', [OrderController::class, 'viewOne'])->name('show');
        Route::get('create', [OrderController::class, 'create'])->name('create');
        Route::post('store', [OrderController::class, 'store'])->name('store');
        Route::get('edit/{order}', [OrderController::class, 'edit'])->name('edit');
        Route::post('update/{order}', [OrderController::class, 'update'])->name('update');
        Route::delete('delete', [OrderController::class, 'deleteOrder'])->name('delete');
        Route::post('status', [OrderController::class, 'changeStatus'])->name('status');
        Route::get('date/{year}/{month}/{day}', [OrderController::class, 'viewByDate'])->name('date');
        Route::get('waybill-no/{waybill_no}', [OrderController::class, 'waybillNo'])->name('waybillNo');
        Route::get('issued-by/{issued_by}', [OrderController::class, 'issuedBy'])->name('issuedBy');
        Route::get('completed', [OrderController::class, 'getCompletedOrders'])->name('completed');
        Route::get('pending', [OrderController::class, 'getPendingOrders'])->name('pending');
        Route::get('overdue', [OrderController::class, 'getOverdueOrders'])->name('overdue');
    });

    /** Contacts  */
    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('create', [ContactController::class, 'create'])->name('create');
        Route::post('store', [ContactController::class, 'store'])->name('store');
        Route::get('edit/{contact}', [ContactController::class, 'edit'])->name('edit');
        Route::post('update', [ContactController::class, 'update'])->name('update');
    });

    /** Deliveries  */
    Route::group(['prefix' => 'deliveries', 'as' => 'deliveries.'], function () {
        Route::get('/', [DeliveryController::class, 'viewDeliveryDates'])->name('index');
        Route::post('store', [DeliveryController::class, 'store'])->name('store');
        Route::delete('delete', [DeliveryController::class, 'delete'])->name('delete');
        Route::get('date/{year}/{month}/{day}', [DeliveryController::class, 'viewByDate'])->name('date');
    });
});

require __DIR__ . '/auth.php';
