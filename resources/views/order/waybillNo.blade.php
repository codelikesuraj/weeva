<x-app-layout>
	<x-slot name="title">Waybill No: {{$waybill_no}}</x-slot>

	<h1 class="m-4 mx-1">Waybill No: {{$waybill_no}}</h1>
	<a href="{{route('dashboard')}}" class="m-2 btn btn-outline-danger">Go back to dashboard</a>

	<div class="card mb-4">
		<div class="card-header">
			<div class="d-flex justify-content-start align-items-center">
				<h4 class="ms-2">Orders ({{$orders->count()}})</h4>
			</div>
		</div>

		<div class="card-body p-1">
      		<x-orderList :orders="$orders" />
		</div>
	</div>
</x-app-layout>