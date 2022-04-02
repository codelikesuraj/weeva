<x-app-layout>
	<x-slot name="title">
		Issued By: {{$issued_by}}
	</x-slot>

	<h1 class="m-4 mx-1">Issued By: {{$issued_by}}</h1>
	<a href="{{route('dashboard')}}" class="m-2 btn btn-outline-danger">Go back to dashboard</a>

	<div class="card mb-4">
		<div class="card-header">
			<h4 class="d-flex justify-content-between align-items-center">
				<div>
					<i class="fas fa-user me-1"></i>
					Order(s)
				</div>
			</h4>
		</div>

		<div class="card-body p-1">
      @foreach($orders as $order)
        <div class="mx-1 px-1 mt-2 list-item">
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
            	<strong>No:&nbsp;</strong>
               <a class="text-dark" href="{{route('waybillNo', [$order->waybill_no])}}">{{$order->waybill_no}}</a>
            </div>
          </div>
          <div class="my-1 p-2" style="background: #eeeeee;">
            <a href="#" class="text-decoration-none text-body">
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

