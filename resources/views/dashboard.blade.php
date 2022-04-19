<x-app-layout>
  <x-slot name="title">
    Dashboard
  </x-slot>

  <h1 class="m-4 mx-1">Dashboard</h1>
  <div class="card mb-4">
    <!-- Success messages -->
    @if (Session::has('status'))
      <x-sbdash.auth-session-status :class="'mb-4 small'" :status="Session::get('status')" />
    @endif
    
    <div class="card-header d-flex justify-content-between align-items-center">
      <div class="d-flex justify-content-start align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <h4 class="ms-2">Pending Orders ({{$orders->count()>0 ? $orders->count() : '0'}})</h4>
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
              <p>No orders yet !!!</p>
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>

</x-app-layout>
