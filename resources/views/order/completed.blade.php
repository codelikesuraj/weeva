<x-app-layout>
  <x-slot name="title">
    Completed Orders
  </x-slot>

  <h1 class="m-4 mx-1">Completed orders</h1>
  <div class="card mb-4">
    <!-- Success messages -->
    @if (Session::has('status'))
      <x-sbdash.auth-session-status :class="'mb-4 small'" :status="Session::get('status')" />
    @endif
    
    <div class="card-header d-flex justify-content-between align-items-center">
      <div class="d-flex justify-content-start align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
          <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
        </svg>
        <h4 class="fs-4 ms-1">
          Completed ({{$orders->count()>0 ? $orders->count() : '0'}})
        </h4>
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
              <p>No completed orders yet !!!</p>
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>

</x-app-layout>
