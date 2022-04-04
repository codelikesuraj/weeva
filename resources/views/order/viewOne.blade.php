<x-app-layout>
	<x-slot name="title">
		Orders | View
	</x-slot>

	<h1 class="m-4 mx-1">Orders</h1>
	<a href="{{route('dashboard')}}" class="m-2 btn btn-outline-danger">Go back to dashboard</a>

	<div class="card mb-4">
		<div class="card-header px-2">
			<h4 class="d-flex justify-content-between align-items-center">
				<div>
					<i class="fas fa-shopping-cart me-1"></i>
					Order Information
				</div>
			</h4>
		</div>

		<div class="card-body p-0">

			<div class="accordion m-0" id="accordionExample">
			  <div class="accordion-item">
			    <h2 class="accordion-header" id="headingOne">
			      <button class="accordion-button text-dark p-2" type="button" data-bs-toggle="collapse" data-bs-target="#orderDetails" aria-expanded="true" aria-controls="orderDetails">
			        <h5>Order Details</h5>
			      </button>
			    </h2>
			    <div id="orderDetails" class="accordion-collapse collapse show p-0" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
			      <div class="accordion-body p-2">
			      	<div class="row">
			      		<div class="col-12 mb-1">
			      			<strong class="">Status:&nbsp;</strong>
		              @if($order->status == 'pending')
		              	<span class="bg-warning text-dark px-1">{{ucfirst($order->status)}}</span>
		             	@else
		             		<span class="bg-success text-light px-1">{{ucfirst($order->status)}}</span>
		             	@endif
		            </div>
				        <div class="col-12 mb-1 ">
				        	<strong>No:</strong>
				        	<a class="text-dark" href="{{route('waybillNo', [$order->waybill_no])}}"> {{$order->waybill_no}}</a>
				        </div>
				        <div class="col-12 mb-1">
				        	<strong class="">Issued on:</strong> {{date('d-M-Y', strtotime($order->date_issued))}}
				        </div>
			        	<div class="col-12 mb-1"><strong>Description:</strong>
			        		<div class="my-0 p-2" style="background: #eeeeee;">
			        			{{$order->quantity.' '.$order->value.' of '.$order->description}}
			        		</div>
			        	</div>
			        	<div class="col-12 mb-1"><strong>Issued By:</strong> 
			        		<a class="text-dark" href="{{route('issuedBy', [$order->issued_by])}}">{{$order->issuedBy->name}}</a>
			        	</div>
			        	<div class="col-12 mb-1">
			        		<strong>Customer:</strong> {{$order->customer_name}}
			        	</div>
			        	<div class="col-12 mb-1">
			        		<strong>Deadline:</strong> {{$order->deadline != '' ? date('d-M-Y', strtotime($order->deadline)) : 'not specified'}}
			        	</div>
				      </div>
				      <div class="row mt-1">
				      	<div class="d-flex justify-content-end">
				      		<a class="btn btn-outline-danger py-1" href="#">Delete</a>
				      		<a class="btn btn-success py-1 mx-1" href="{{route('editOrder', [$order->id])}}">Edit</a>
				      	</div>
				      </div>
			      </div>
			    </div>
			  </div>
			  <div class="accordion-item">
			    <h2 class="accordion-header" id="headingTwo">
			      <button class="accordion-button collapsed text-dark p-2" type="button" data-bs-toggle="collapse" data-bs-target="#deliveryDetails" aria-expanded="false" aria-controls="deliveryDetails">
			        <h5>Delivery Details</h5>
			      </button>
			    </h2>
			    <div id="deliveryDetails" class="accordion-collapse collapse p-0" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
			      <div class="accordion-body p-2 text-center">
			        ⚠ Feature coming soon !!!
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</x-app-layout>