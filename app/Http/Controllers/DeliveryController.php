<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function viewDeliveryDates(){
        $user_id = Auth::user()->id;
        $deliveries = Delivery::query()
            ->select('date_delivered')
            ->where('user_id', '=', $user_id)
            ->distinct()
            ->orderBy('date_delivered', 'desc')
            ->get();
        
        return view('delivery.listDeliveryDates')->with([
            'deliveries' => $deliveries
        ]);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $request->validate([
            'quantity' => ['required', 'numeric', 'min:1'],
            'order_id' => ['required'],
            'date_delivered' => ['date', 'required'],
            'value' => ['required', 'in:pcs,sets'],
        ]);

        $delivery = Delivery::create([
            'quantity' => $request->quantity,
            'user_id' => $user_id,
            'order_id' => $request->order_id,
            'date_delivered' => trim($request->date_delivered),
            'value' => $request->value,
        ]);

        $this->updateOrderStatus($request->order_id);

        return back()->with([
            'status' => [
                'Delivery has been saved successfully',
            ],
        ]);
    }

    public function delete(Request $request){
        $delivery = Delivery::find($request->delivery_id);
        
        if($delivery == null):
            return redirect('/dashboard');
        endif;
            
        $order_id = $delivery->order_id;

        $delivery->delete();

        $this->updateOrderStatus($order_id);

        return back()->with([
            'status' => [
                'Delivery record has been removed'
            ],
        ]);
    }

    public function viewByDate($year, $month, $day){
        $date = $year.'-'.$month.'-'.$day;
        
        $delivery = Delivery::where('date_delivered', '=', $date)->get();
        
        return view('delivery.date')->with([
            'deliveries' => $delivery,
            'date' => $date,
        ]);
    }

    public function updateOrderStatus($order)
    {
        $order = Order::find($order);

        $quantity_ordered = $order->quantity;
        $quantity_supplied = $order->deliveries->pluck('quantity')->sum();

        echo 'Ordered :'.$quantity_ordered;
        echo '<br>';
        echo 'Supplied: '.$quantity_supplied;
        if($quantity_supplied >= $quantity_ordered):
            if($order->status == 'pending'):
                $order->status = 'complete';
                $order->update();
            endif;
        else:
            if($order->status == 'complete'):
                $order->status = 'pending';
                $order->update();
            endif;
        endif;
    }
}
