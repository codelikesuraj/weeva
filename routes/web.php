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

Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('/dashboard', function () {
        $user_id = Auth::user()->id;
        $orders = Order::where('owned_by', '=', $user_id)->orderBy('waybill_no', 'desc')->get();
        $contact_count = Contact::where([
            ['created_by', '=', $user_id],
            ['type', '=', 'sales'],
        ])->count();
        return view('dashboard', [
            'orders' => $orders,
            'contact_count' => $contact_count,
        ]);
    })->name('dashboard');

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
