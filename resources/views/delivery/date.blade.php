<x-app-layout>
	<x-slot name="title">
		Delivery date: {{date('d-m-y', strtotime($date))}}
	</x-slot>

	<h1 class="m-4 mx-1">Delivery date: {{date('D, d-M-Y', strtotime($date))}}</h1>
	<a href="{{route('dashboard')}}" class="m-2 btn btn-outline-danger">Go back to dashboard</a>

	<div class="card mb-4">
		<div class="card-header">
			<h4 class="d-flex justify-content-between align-items-center">
				<div>
					<i class="fas fa-user me-1"></i>
					Deliveries
				</div>
			</h4>
		</div>

		<div class="card-body p-1">

			<!-- Success messages -->
			@if (Session::has('status'))
				<x-sbdash.auth-session-status :class="'mb-4 small'" :status="Session::get('status')" />
			@endif
			@if($deliveries->count()>0)
	      @foreach($deliveries as $delivery)
	        <div class="mx-1 px-1 mt-2 list-item">
	          <div class="d-flex justify-content-between">
	            <div>
	            	<strong>No:&nbsp;</strong>
	               <a class="text-dark" href="{{route('waybillNo', [$delivery->orderInfo->waybill_no])}}">{{$delivery->orderInfo->waybill_no}}</a>
	            </div>
	          	<div>
	          		<strong>From:</strong> 
		        		<a class="text-dark" href="{{route('issuedBy', [$delivery->orderInfo->issued_by])}}">{{$delivery->orderInfo->issuedBy->name}}</a>
		        	</div>
	          </div>
	          <div class="my-1 p-2" style="background: #eeeeee;">
	            <a href="{{route('viewOne', [$delivery->orderInfo->id])}}" class="text-decoration-none text-body">
	              {{$delivery->quantity.' '.$delivery->value.' of '.$delivery->orderInfo->description}}
	            </a>
	          </div>
	          <div class="d-flex justify-content-end">
	            <strong>Customer:&nbsp;</strong>{{ucwords($delivery->orderInfo->customer_name)}}
	          </div>
	          <div class="mt-2 mb-1 d-flex justify-content-end">
	          	<!-- Delete delivery button -->
	    				<button type="button" class="small btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteDelivery{{$delivery->id}}">Delete</button>
		      		<!-- Delete delivery modal -->
			      	<div class="modal fade" id="deleteDelivery{{$delivery->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Delete delivery</h5>
							        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							      </div>
							      <div class="modal-body">
							      	<p>Before you continue, know that this action cannot be undone.</p>
							        <p>Are you still sure you want to delete this delivery?</p>
							        <form method="post" action="{{route('deleteDelivery')}}">
							        	@csrf
							        	<input type="hidden" name="delivery_id" value="{{$delivery->id}}">
							        	<button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">No</button>
							        	<button type="submit" class="btn btn-danger">Yes, I am very very sure</button>
							        </form>
							      </div>
							    </div>
							  </div>
							</div>
	          </div>
	        </div><hr class="my-3">
	      @endforeach
	    @else
	    	<div class="mx-1 px-1 mt-2 list-item">
	    		<p>There are no deliveries on this day</p>
	    	</div>
	    @endif
		</div>
	</div>
</x-app-layout>

