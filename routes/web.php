<?php

use App\Models\Order;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;

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

Route::get('/dashboard', function () {
    $orders = Order::where('owned_by', '=', Auth::user()->id)->orderBy('waybill_no', 'desc')->get();
    return view('dashboard', [
        'orders' => $orders,
    ]);
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // orders
    Route::get('/orders', [OrderController::class, 'create'])->name('order');
    Route::post('/orders', [OrderController::class, 'store']);

    // contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('create-contact');
    Route::post('/contacts/create', [ContactController::class, 'store'])->name('store-contact');
    // Route::get('/contacts/update/{contact}', [ContactController::class, 'edit'])->name('edit-contact');
    // Route::post('/contacts/update', [ContactController::class, 'update']);
    Route::get('/contacts/delete/{contact}', [ContactController::class, 'confirm_delete'])->name('confirm-delete-contact');
    Route::post('/contacts/delete', [ContactController::class, 'delete'])->name('delete-contact');

});

require __DIR__.'/auth.php';
