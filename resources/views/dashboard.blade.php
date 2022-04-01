<x-app-layout>
  <x-slot name="title">
    Dashboard
  </x-slot>

  <h1 class="mt-4">Dashboard</h1>
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
          @if($contact_count < 1)
            <p class="fs-5 text-center">You don't have any <strong>sales</strong> contact saved yet !!!<br/>Click the button below to add one now </p>
            <div class="d-flex justify-content-center"><a class="m-auto btn btn-info" href="{{route('create-contact')}}">Add Contact</a></div>
          @else
            <p>No orders yet !!!</p>
          @endif
        </div>
      @endif
    </div>
  </div>

</x-app-layout>