<x-app-layout>
	<x-slot name="title">
		Delivery dates
	</x-slot>

	<h1 class="m-4 mx-1">Delivery dates</h1>
	<a href="{{route('dashboard')}}" class="m-2 btn btn-outline-danger">Go back to dashboard</a>

	<div class="card mb-4">
		<div class="card-header">
			<h3 class="d-flex justify-content-start align-items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
					<path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
					</svg>
				<span class="ms-2">Deliveries</span>
			</h3>
		</div>

		<div class="card-body p-1">
			@if($deliveries != null && $deliveries->count() > 0)
	      @foreach($deliveries as $delivery)
	        <a class="text-dark text-decoration-none" href="{{
	        	route('viewDeliveriesByDate', [
	        		date('Y', strtotime($delivery->date_delivered)),
      				date('m', strtotime($delivery->date_delivered)),
      				date('d', strtotime($delivery->date_delivered)),
      			])
      		}}">
      			<div class="mx-1 px-1 mt-2 text-center">
      				{{
      					date('l, M-d-Y', strtotime($delivery->date_delivered))
      				}}
	        	</div>
	        	<hr class="my-3">
	        </a>
	      @endforeach
	    @else
	     	<p class="mx-2 mt-2">No deliveries yet !!!</p>
	    @endif
		</div>
	</div>
</x-app-layout>

