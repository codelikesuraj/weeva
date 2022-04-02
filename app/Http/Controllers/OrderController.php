<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function create(){
        return view('order.create', [
            'contacts' => Contact::where('type', '=', 'sales')->orderBy('name')->get()
        ]);
    }

    function store(Request $request){
        $request->validate([
            'waybill_no' => ['required'],
            'date_issued' => ['required', 'date'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'value' => ['required', 'string', 'min:3', 'max:4'],
            'description' => ['required', 'string', 'min:5'],
            'customer_name' => ['required', 'string', 'min:2'],
            'issued_by' => ['required', 'numeric', 'min:1'],
            'deadline' => ['date'],
        ]);

        $order = Order::create([
            'owned_by' => Auth::user()->id,
            'waybill_no' => $request->waybill_no,
            'date_issued' => $request->date_issued,
            'quantity' => $request->quantity,
            'value' => $request->value,
            'description' => $request->description,
            'customer_name' => $request->customer_name,
            'issued_by' => $request->issued_by,
            'deadline' => $request->deadline,
        ]);

        return redirect('/dashboard');
    }

    function waybillNo($waybill_no){
        $orders = Order::where('waybill_no', '=', $waybill_no)->orderBy('status', 'asc')->orderBy('quantity', 'desc')->get();
        if($orders->count()<1):
            abort(404);
        endif;
        return view('order.waybillNo')->with([
            'orders' => $orders,
            'waybill_no' => $orders[0]->waybill_no,
        ]);
    }

    function issuedBy($issued_by){
        $orders = Order::where('issued_by', '=', $issued_by)->orderBy('status', 'asc')->orderBy('quantity', 'desc')->get();
        if($orders->count()<1):
            abort(404);
        endif;
        return view('order.issuedBy')->with([
            'orders' => $orders,
            'issued_by' => $orders[0]->issuedBy->name,
        ]);
    }
}
