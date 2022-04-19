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
      <div class="d-flex justify-content-start align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
          <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
        </svg>
        <h4 class="fs-4 ms-1">
          Pending ({{$orders->count()>0 ? $orders->count() : '0'}})
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
              <p>No pending orders yet !!!</p>
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>

</x-app-layout>
