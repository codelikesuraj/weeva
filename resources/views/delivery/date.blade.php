<x-app-layout>
	<x-slot name="title">
		Delivery date: {{date('j-M-y', strtotime($date))}}
	</x-slot>

	<h1 class="m-4 mx-1">Delivery date: {{date('D, d-M-Y', strtotime($date))}}</h1>
	<a href="{{route('viewDeliveryDates')}}" class="m-2 btn btn-outline-danger">Go back to deliveries</a>

	<div class="card mb-4">
		<div class="card-header">
			<h3 class="d-flex justify-content-start align-items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
				  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
				</svg>
				<span class="ms-2">Deliveries ({{$deliveries->count()>0 ? $deliveries->count() : '0'}})</span>
			</h3>
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

