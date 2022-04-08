<x-app-layout>
	<x-slot name="title">
		Delivery dates
	</x-slot>

	<h1 class="m-4 mx-1">Delivery dates</h1>
	<a href="{{route('dashboard')}}" class="m-2 btn btn-outline-danger">Go back to dashboard</a>

	<div class="card mb-4">
		<div class="card-header">
			<h4 class="d-flex justify-content-between align-items-center">
				<div>
					<i class="fas fa-truck me-1"></i>
					Deliveries
				</div>
			</h4>
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

