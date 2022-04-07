<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    function store(Request $request){
        $user_id = Auth::user()->id;
        $request->validate([
            'quantity' => ['required', 'numeric', 'min:1'],
            'order_id' => ['required'],
            'date_delivered' => ['date', 'required'],
            'value' => ['required'],
        ]);

        $delivery = Delivery::create([
            'quantity' => $request->quantity,
            'user_id' => $user_id,
            'order_id' => $request->order_id,
            'date_delivered' => trim($request->date_delivered),
            'value' => $request->value,
        ]);

        return back()->with([
            'status' => [
                'Delivery has been saved successfully',
            ],
        ]);
    }

    function delete(Request $request){
        $delivery = Delivery::find($request->delivery_id);

        $delivery->delete();

        return back()->with([
            'status' => [
                'Delivery record has been removed'
            ],
        ]);
    }

    function viewByDate($year, $month, $day){
        $date = $year.'-'.$month.'-'.$day;
        $delivery = Delivery::where('date_delivered', '=', $date)->get();
        
        return view('delivery.date')->with([
            'deliveries' => $delivery,
            'date' => $date,
        ]);
    }
}
