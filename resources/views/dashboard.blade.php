<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl font-bolder">Pending Order</h1>
                    <table class="w-full shadow-lg bg-white border-collapse">
                        <thead>
                            <tr>
                                <th class="bg-blue-100 p-2 border">Waybill No</th>
                                <th class="bg-blue-100 p-2 border">Description</th>
                                <th class="bg-blue-100 p-2 border">Customer Name</th>
                                <th class="bg-blue-100 p-2 border">Issued By</th>
                                <th class="bg-blue-100 p-2 border">Issued On</th>
                                <th class="bg-blue-100 p-2 border">Deadline</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="bg-blue-100 p-2 border">Waybill No</th>
                                <th class="bg-blue-100 p-2 border">Description</th>
                                <th class="bg-blue-100 p-2 border">Customer Name</th>
                                <th class="bg-blue-100 p-2 border">Issued By</th>
                                <th class="bg-blue-100 p-2 border">Issued On</th>
                                <th class="bg-blue-100 p-2 border">Deadline</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if($orders)
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="border p-2 text-center">{{$order->waybill_no}}</td>
                                        <td class="border p-2 text-center">{{$order->quantity.' '.$order->value.' '.$order->description}}</td>
                                        <td class="border p-2 text-center">{{$order->customer_name}}</td>
                                        <td class="border p-2 text-center">{{ucwords($order->issuedBy->name)}}</td>
                                        <td class="border p-2 text-center">{{$order->date_issued}}</td>
                                        <td class="border p-2 text-center">{{$order->deadline ? $order->deadline : '-----'}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td class="p-6" colspan="6">No orders yet !!!</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl font-bolder">Completed Order</h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
