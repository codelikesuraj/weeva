<x-app-layout>
  <x-slot name="title">
    Pending Orders
  </x-slot>

  <h1 class="m-4 mx-1">Pending orders</h1>
  <div class="card mb-4">
    <!-- Success messages -->
    @if (Session::has('status'))
      <x-sbdash.auth-session-status :class="'mb-4 small'" :status="Session::get('status')" />
    @endif
    
    <div class="card-header d-flex justify-content-between align-items-center">
      <div>
        <h4 class="fs-4"><i class="fas fa-hourglass me-1"></i>Pending {{$orders->count()>0 ? $orders->count() : '0'}})</h4>
      </div>
      <div>
        <a href="{{route('order')}}" class="btn btn-success p-1 px-2 small">Add</a>
      </div>
    </div>
    <div class="p-1 card-body">
      <div class="row">
        @if($orders && $orders->count()>0)
          <x-orderList :orders="$orders" />
        @else
          <div class="m-1">
            @if($contact_count < 1)
              <p class="text-center">You don't have any <strong>sales</strong> contact saved yet !!!<br/>Click the button below to add one now </p>
              <div class="d-flex justify-content-center"><a class="m-auto btn btn-info border border-dark border-2 rounded-3" href="{{route('create-contact')}}">Add Contact</a></div>
            @else
              <p>No pending orders yet !!!</p>
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>

</x-app-layout>
