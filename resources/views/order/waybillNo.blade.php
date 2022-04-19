<x-app-layout>
	<x-slot name="title">
		Waybill No: {{$waybill_no}}
	</x-slot>

	<h1 class="m-4 mx-1">Waybill No: {{$waybill_no}}</h1>
	<a href="{{route('dashboard')}}" class="m-2 btn btn-outline-danger">Go back to dashboard</a>

	<div class="card mb-4">
		<div class="card-header">
			<div class="d-flex justify-content-start align-items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
				  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
				</svg>
				<h4 class="ms-2">
					Orders ({{$orders->count()}})
				</h4>
			</div>
		</div>

		<div class="card-body p-1">
      @foreach($orders as $order)
        <div class="mx-1 px-1 mt-2 small">
          <div class="d-flex justify-content-between">
          	<div>
              <strong>Status:&nbsp;</strong>
              @if($order->status == 'pending')
              	<span class="bg-warning text-body px-1">
             	@else
             		<span class="bg-success text-white px-1">
             	@endif
             		{{ucfirst($order->status)}}</span>
            </div>
            <div>
              <strong>From:&nbsp;</strong>
              <a class="text-dark" href="{{route('issuedBy', [$order->issued_by])}}">{{$order->issuedBy->name}}</a>
            </div>
          </div>
          <div class="my-1 p-2" style="background: #eeeeee;">
            <a href="{{route('viewOne', [$order->id])}}" class="text-decoration-none text-body">
              {{$order->quantity.' '.$order->value.' of '.$order->description}}
            </a>
          </div>
          <div class="d-flex justify-content-end">
            <strong>Customer:&nbsp;</strong>{{ucwords($order->customer_name)}}
          </div>
        </div><hr class="my-3">
      @endforeach
		</div>
	</div>
</x-app-layout>

