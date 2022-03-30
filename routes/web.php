<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/order', [OrderController::class, 'create'])->name('order');
    Route::post('/order', [OrderController::class, 'store']);
});

require __DIR__.'/auth.php';
