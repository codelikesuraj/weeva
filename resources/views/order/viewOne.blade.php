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

		<!-- Success messages -->
		@if (Session::has('status'))
			<x-sbdash.auth-session-status :class="'mb-4 small'" :status="Session::get('status')" />
		@endif

		<div class="card-body p-0">

			<div class="accordion m-0" id="accordionExample">
			  <div class="accordion-item">
			    <h2 class="accordion-header" id="headingOne">
			      <button class="accordion-button text-dark p-2" type="button" data-bs-toggle="collapse" data-bs-target="#orderDetails" aria-expanded="true" aria-controls="orderDetails">
			        <h5>Order Details</h5>
			      </button>
			    </h2>
			    @if($errors->any())
			    	<div id="orderDetails" class="accordion-collapse collapse p-0" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
						<script>
					    window.onload = () => {
					    	var myModal = new bootstrap.Modal(document.getElementById('addDelivery'), {})
								myModal.show()
					    }
						</script>
			    @else
			    	<div id="orderDetails" class="accordion-collapse collapse show p-0" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
					@endif
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
				      		<!-- Delete order button -->
				      		<button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteOrder">
									  Delete
									</button>
				      		<a class="btn btn-small btn-success py-1 mx-1" href="{{route('editOrder', [$order->id])}}">Edit</a>
				      	</div>
				      	<!-- Delete order modal -->
				      	<div class="modal fade" id="deleteOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Delete order</h5>
								        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								      </div>
								      <div class="modal-body">
								      	<p>Before you continue, know that this action cannot be undone.</p>
								        <p>Are you still sure you want to delete this order ?</p>
								        <form method="post" action="{{route('deleteOrder')}}">
								        	@csrf
								        	<input type="hidden" name="order_id" value="{{$order->id}}">
								        	<button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">No</button>
								        	<button type="submit" class="btn btn-danger">Yes, I am very very sure</button>
								        </form>
								      </div>
								    </div>
								  </div>
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
			    @if($errors->any())
			    	<div id="deliveryDetails" class="accordion-collapse collapse show p-0" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
			    @else
			    	<div id="deliveryDetails" class="accordion-collapse collapse p-0" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
					@endif
			      <div class="accordion-body p-2 text-center">
			      	<div class="row">
			      		<div class="col-12 d-flex justify-content-end">
			      			<!-- Add delivery button -->
				      		<button type="button" class="small btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addDelivery">
									  Add
									</button>
									<!-- Add delivery modal -->
									<div class="modal fade" id="addDelivery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel">Add delivery</h5>
									        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      </div>
									      <div class="modal-body">
									      	<!-- Errors -->
													<x-sbdash.auth-validation-errors :class="'mb-4 small'" :errors="$errors" />

									        <form method="POST" action="{{route('saveDelivery')}}">
									        	@csrf
									        	<input type="hidden" name="order_id" value="{{$order->id}}">
														<div class="row">
															<!-- Quantity-->
															<div class="mb-3 col-6 col-lg-1 input-group">
																<span class="input-group-text"><strong>Quantity</strong></span>
																<input id="quantity" class="form-control" type="number" name="quantity" required  />
																<select class="form-select" name="value" required >
																	<option>select</option>
																	<option value="pcs">pcs</option>
																	<option value="sets">sets</option>
																</select>
															</div>
															<!-- Date delivered -->
															<div class="mb-3 col-6 col-lg-1 input-group">
																<span class="input-group-text"><strong>Delivered on</strong></span>
																<input type="date" name="date_delivered" value="{{date('Y-m-d')}}" required />
															</div>
														</div>
														<div class="d-flex justify-content-end">
															<button type="submit" class="btn btn-success">Save</button>
														</div>
									        </form>
									      </div>
									    </div>
									  </div>
									</div>
			      		</div>
			      		@if($deliveries && $deliveries->count()>0)
			      			@foreach($deliveries as $delivery)
			      				<hr class="my-2 mx-1">
			      				<div class="col-12 d-flex justify-content-between">
						      	<div class="small">
						      			{{
						      				$delivery->quantity.' '.$delivery->value.' delivered on '.date('l', strtotime($delivery->date_delivered))
						      			}}<br/>
						      			<a href="{{
						      				route('viewDeliveriesByDate', [
						      					date('Y', strtotime($delivery->date_delivered)),
						      					date('m', strtotime($delivery->date_delivered)),
						      					date('d', strtotime($delivery->date_delivered)),
						      				])
						      			}}">
						      				{{date('M-d-Y', strtotime($delivery->date_delivered))}}
						      			</a>
						      	</div>
						      	<div class="">
						      		<!-- Delete delivery button -->
				      				<button type="button" class="small btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteDelivery">Delete</button>
						      		<!-- Delete delivery modal -->
							      	<div class="modal fade" id="deleteDelivery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						      </div>
					      	@endforeach
				      	@else
				      		<div class="col-12 d-flex justify-content-center">
				      			No deliveries yet !!!
				      		</div>
				      	@endif
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</x-app-layout>