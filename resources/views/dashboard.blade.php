<x-app-layout>
  <x-slot name="title">
    Dashboard
  </x-slot>

  <h1 class="m-4 mx-1">Dashboard</h1>
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div>
        <h4 class="fs-4"><i class="fas fa-table me-1"></i>Pending Order</h4>
      </div>
      <div>
        <a href="{{route('order')}}" class="btn btn-success p-1 px-2 ">Add</a>
      </div>
    </div>
    <div class="p-1 card-body">
      @if($orders && $orders->count()>0)
        @foreach($orders as $order)
          <div class="mx-1 px-1 mt-2 list-item">
            <div class="d-flex justify-content-between">
              <div>
                <strong>No:&nbsp;</strong>
                <a class="text-dark" href="{{route('waybillNo', [$order->waybill_no])}}">{{$order->waybill_no}}</a>
             </div>
              <div>
                <strong>From:&nbsp;</strong>
                <a class="text-dark" href="{{route('issuedBy', [$order->issued_by])}}">{{$order->issuedBy->name}}</a>
              </div>
            </div>
            <p class="my-1 p-2" style="background: #eeeeee;">
              <a href="{{route('viewOne', [$order->id])}}" class="text-decoration-none text-body">
                {{$order->quantity.' '.$order->value.' of '.$order->description}}
              </a>
            </p>
            <div class="d-flex justify-content-end">
              <strong>Customer:&nbsp;</strong>{{ucwords($order->customer_name)}}
            </div>
          </div><hr class="my-3">
        @endforeach
      @else
        <div class="m-1 list-item">
          @if($contact_count < 1)
            <p class="fs-5 text-center">You don't have any <strong>sales</strong> contact saved yet !!!<br/>Click the button below to add one now </p>
            <div class="d-flex justify-content-center"><a class="m-auto btn btn-info border border-dark border-2 rounded-3" href="{{route('create-contact')}}">Add Contact</a></div>
          @else
            <p>No orders yet !!!</p>
          @endif
        </div>
      @endif
    </div>
  </div>

</x-app-layout>
