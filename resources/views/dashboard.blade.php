<x-app-layout>
  <x-slot name="title">
    Dashboard
  </x-slot>

  <h1 class="mt-4">Dashboard</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>
  <div class="card mb-4">
    <div class="card-header">
      <h4>
        <i class="fas fa-table me-1"></i>
        Pending Order
      </h4>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
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
          @if($orders && $orders->count()>0)
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

</x-app-layout>
