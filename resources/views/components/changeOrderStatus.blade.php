@props(['quantityOrdered', 'quantitySupplied', 'orderId', 'currentStatus'])

@if($currentStatus !== 'complete' && $quantitySupplied >= $quantityOrdered)
	<div class="my-2 d-flex justify-content-end">
		<form method="post" action="{{route('changeOrderStatus')}}">
			@csrf
			<input type="hidden" name="order_id" value="{{$orderId}}">
			<input type="hidden" name="current_status" value="{{$currentStatus}}">
			<button type="submit" class="p-1 btn btn-outline-success small">Mark as complete</button>
		</form>
	</div>
@endif