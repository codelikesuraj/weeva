<x-app-layout>
	<x-slot name="title">
		Delivery date: {{date('d-m-y', strtotime($date))}}
	</x-slot>

	<h1 class="m-4 mx-1">Delivery date: {{date('D, d-M-Y', strtotime($deliveries[0]->date_delivered))}}</h1>
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
        </div><hr class="my-3">
      @endforeach
		</div>
	</div>
</x-app-layout>

