<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function viewOne(Order $order)
    {
        return view('order.viewOne')->with([
            'order' => $order,
            'deliveries' => $order->deliveries,
        ]);
    }

    public function changeStatus(Request $request)
    {
        $order = Order::where([
            ['id', '=', $request->order_id],
            ['owned_by', '=', Auth::id()]
        ])->first();
        $order_status = strtolower(trim($request->current_status));

        switch ($order_status) {
            case 'complete':
                $order->status = 'pending';
                break;

            case 'pending':
                $order->status = 'complete';
                break;

            default:
                abort(404);
                break;
        }

        $order->update();

        return back()->with([
            'status' => [
                'Order has been marked as complete',
            ],
        ]);
    }

    public function getPendingOrders()
    {
        $user_id = Auth::user()->id;

        $orders = Order::query()
            ->where([
                ['owned_by', '=', $user_id],
                ['status', '=', 'pending']
            ])
            ->orderBy('waybill_no', 'desc')
            ->get();

        $contact_count = Contact::where([
            ['created_by', '=', $user_id],
            ['type', '=', 'sales'],
        ])->count();

        return view('order.pending', [
            'orders' => $orders,
            'contact_count' => $contact_count,
        ]);
    }

    public function getAllOrders()
    {
        $user_id = Auth::user()->id;

        $orders = Order::query()
            ->where('owned_by', '=', $user_id)
            ->orderBy('waybill_no', 'desc')
            ->get();

        $contact_count = Contact::where([
            ['created_by', '=', $user_id],
            ['type', '=', 'sales'],
        ])->count();

        return view('order.all', [
            'orders' => $orders,
            'contact_count' => $contact_count,
        ]);
    }

    public function dashboard()
    {
        $user_id = Auth::user()->id;

        $chart_orders = Order::query()
        ->selectRaw('MONTH(date_issued) as month, count(MONTH(date_issued)) as orders')
        ->groupByRaw('month')
        ->orderByRaw('month')
        ->whereRaw('YEAR(date_issued) = '.date('Y').' AND owned_by = '.$user_id)
        ->get();
        
        $chart = [];
        foreach($chart_orders as $order){
            $chart['labels'][] = date('M', mktime(0, 0, 0, $order['month'], 10));
            $chart['data'][] = $order['orders'];
        }

        $orders = Order::query()
            ->where('owned_by', '=', $user_id)
            ->get();
        
        $lastMonthDate = Date("y-m", strtotime("first day of previous month"));
        $thisMonthDate = Date("y-m");

        $orders_last_month = $orders->filter(function ($value) use ($lastMonthDate){
            return stripos($value['date_issued'], $lastMonthDate);
        })->count() ?? 0;
        $orders_this_month = $orders->filter(function ($value) use ($thisMonthDate){
            return stripos($value['date_issued'], $thisMonthDate);
        })->count() ?? 0;

        $contact_count = Contact::where([
            ['created_by', '=', $user_id],
            ['type', '=', 'sales'],
        ])->count();
        
        return view('dashboard', [
            'total_orders' => $orders->count() ?? 0,
            'completed_orders' => $orders->where('status', 'complete')->count() ?? 0,
            'pending_orders' => $orders->where('status', 'pending')->count() ?? 0,
            'orders_this_month' => $orders_this_month,
            'orders_last_month' => $orders_last_month,
            'contact_count' => $contact_count,
            'data' => $chart,
        ]);
    }

    public function getCompletedOrders()
    {
        $user_id = Auth::user()->id;

        $orders = Order::query()
            ->where([
                ['owned_by', '=', $user_id],
                ['status', '=', 'complete']
            ])
            ->orderBy('waybill_no', 'desc')
            ->get();

        $contact_count = Contact::query()
            ->where([
                ['created_by', '=', $user_id],
                ['type', '=', 'sales'],
            ])
            ->count();

        return view('order.completed', [
            'orders' => $orders,
            'contact_count' => $contact_count,
        ]);
    }

    public function create()
    {
        return view('order.create', [
            'contacts' => Contact::query()
                ->where([
                    ['type', '=', 'sales'],
                    ['created_by', '=', Auth::user()->id]
                ])->orderBy('name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'waybill_no' => ['nullable', 'string', 'max:20'],
            'date_issued' => ['required', 'date'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'value' => ['required', 'string', 'min:3', 'max:4'],
            'description' => ['required', 'string', 'min:5', 'max:70'],
            'customer_name' => ['nullable', 'string', 'max:50'],
            'issued_by' => ['required', 'numeric', 'min:1'],
            'deadline' => ['date', 'nullable'],
        ]);

        $issued_by_name = Contact::find($request->issued_by)->name;
        $issued_by = strtolower($issued_by_name);
        $issued_by = trim($issued_by);
        $issued_by = str_ireplace(' ', '_', $issued_by);

        $waybill_no = trim($request->waybill_no);
        $customer_name = trim($request->customer_name);

        $waybill_no = is_null($request->waybill_no) || empty($request->waybill_no) ? $issued_by : $request->waybill_no;
        $customer_name = is_null($request->customer_name) || empty($request->customer_name) ? $issued_by_name : $request->customer_name;

        $order = Order::create([
            'owned_by' => Auth::user()->id,
            'waybill_no' => $waybill_no,
            'date_issued' => $request->date_issued,
            'quantity' => $request->quantity,
            'value' => $request->value,
            'description' => $request->description,
            'customer_name' => ucwords($customer_name),
            'issued_by' => $request->issued_by,
            'deadline' => $request->deadline,
        ]);

        $return = back()->with([
            'status' => [
                'Order has been created successfully',
                '<a href="' . route('order.show', [$order->id]) . '">Click here to view order</a>',
            ],
        ]);

        if ($request->submit == 'copy') :
            return $return->withInput($request->all());
        endif;

        return $return;
    }

    public function edit(Order $order)
    {
        return view('order.edit')->with([
            'order' => $order,
            'contacts' => Contact::query()
                ->where([
                    ['type', '=', 'sales'],
                    ['created_by', '=', Auth::user()->id]
                ])->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'waybill_no' => ['nullable', 'string', 'max:20'],
            'date_issued' => ['required', 'date'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'value' => ['required', 'string', 'min:3', 'max:4'],
            'description' => ['required', 'string', 'min:5', 'max:70'],
            'customer_name' => ['nullable', 'string', 'max:50'],
            'issued_by' => ['required', 'numeric', 'min:1'],
            'deadline' => ['date', 'nullable'],
        ]);

        $issued_by_name = Contact::find($request->issued_by)->name;
        $issued_by = strtolower($issued_by_name);
        $issued_by = trim($issued_by);
        $issued_by = str_ireplace(' ', '_', $issued_by);

        $waybill_no = trim($request->waybill_no);
        $customer_name = trim($request->customer_name);

        $waybill_no = is_null($request->waybill_no) || empty($request->waybill_no) ? $issued_by : $request->waybill_no;
        $customer_name = is_null($request->customer_name) || empty($request->customer_name) ? $issued_by_name : $request->customer_name;

        $order = Order::find($request->order_id);

        if (!is_null($order)) :
            $order->waybill_no = $waybill_no;
            $order->date_issued = $request->date_issued;
            $order->quantity = $request->quantity;
            $order->value = $request->value;
            $order->description = $request->description;
            $order->customer_name = $customer_name;
            $order->issued_by = $request->issued_by;
            $order->deadline = $request->deadline;

            $order->update();

            return back()->with([
                'status' => ['Order has been updated successfully']
            ]);
        endif;
    }

    public function deleteOrder(Request $request)
    {

        $order = Order::find($request->order_id);

        if (is_null($order)) :
            return redirect('/dashboard');
        endif;

        $order->delete();

        return redirect('/dashboard')->with('status', ['Order has been deleted successfully']);
    }

    public function waybillNo($waybill_no)
    {
        $orders = Order::where([
            ['waybill_no', '=', $waybill_no],
            ['owned_by', '=', Auth::id()]
        ])->orderBy('status', 'asc')
            ->orderBy('quantity', 'desc')
            ->get();

        if ($orders->count() < 1) :
            abort(404);
        endif;

        return view('order.waybillNo')->with([
            'orders' => $orders,
            'waybill_no' => $orders[0]->waybill_no,
        ]);
    }

    public function issuedBy($issued_by)
    {
        $orders = Order::where([
            ['issued_by', '=', $issued_by],
            ['owned_by', '=', Auth::id()]
        ])->orderBy('status', 'asc')
            ->orderBy('quantity', 'desc')
            ->get();

        if ($orders->count() < 1) :
            abort(404);
        endif;

        return view('order.issuedBy')->with([
            'orders' => $orders,
            'issued_by' => $orders[0]->issuedBy->name,
        ]);
    }

    public function viewByDate($month, $year, $date)
    {
        //
    }
}
