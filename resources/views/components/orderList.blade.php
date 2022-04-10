@props(['orders'])

@foreach($orders as $order) 
	<div class="col-12">
		<div class="d-flex justify-content-between">
			<div>
				<strong>No:</strong>
				<a class="text-dark" href="{{route('waybillNo', [$order->waybill_no])}}"> {{$order->waybill_no}}</a>
			</div>
			<div>
				<strong>From:</strong>
				<a class="text-dark" href="{{route('issuedBy', [$order->issued_by])}}"> {{$order->issuedBy->name}}</a>
			</div>
		</div>
		<p class="my-1 p-2" style="background: #eeeeee;">
			<a href="{{route('viewOne', [$order->id])}}" class="text-decoration-none text-body">
				{{$order->quantity.' '.$order->value.' of '.$order->description}}
			</a>
		</p>
		<div class="d-flex justify-content-end">
			<strong>Customer:</strong>&nbsp;{{ucwords($order->customer_name)}}
		</div>
		<hr class="m-1 mb-2">
	</div>
@endforeach