<x-app-layout>
  <x-slot name="title">
    Dashboard
  </x-slot>

  <h1 class="mt-4">Dashboard</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div>
        <h4 class="fs-4"><i class="fas fa-table me-1"></i>Pending Order</h4>
      </div>
      <div>
        <a href="{{route('order')}}" class="btn btn-success p-1 px-2 ">Add</a>
      </div>
    </div>
    <div class="py-1 card-body">
      @if($orders && $orders->count()>0)
        @foreach($orders as $order)
          <div class="m-1 list-item">
            <strong>No:</strong> {{$order->waybill_no}}<br/>
            {{$order->quantity.' '.$order->value.' '.$order->description}}
          </div><hr class="my-2">
        @endforeach
      @else
        <div class="m-1 list-item">
          <p>No orders yet !!!</p>
        </div>
      @endif
    </div>
  </div>

</x-app-layout>