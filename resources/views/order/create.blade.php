<x-app-layout>
	<x-slot name="title">
		Orders | Create
	</x-slot>

	<h1 class="m-4 mx-1">Orders</h1>
	<a href="{{route('dashboard')}}" class="m-2 btn btn-outline-danger">Go back to dashboard</a>

	<div class="card mb-4">
		<div class="card-header">
			<h4 class="d-flex justify-content-between align-items-center">
				<div>
					<i class="fas fa-user me-1"></i>
					Create Order
				</div>
			</h4>
		</div>

		<div class="card-body p-4">
			<form method="POST" action="{{ route('order') }}">
				@csrf
				<!-- Validation Errors -->
				<x-sbdash.auth-validation-errors :class="'mb-4 small'" :errors="$errors" />

				<!-- Success messages -->
				@if (Session::has('status'))
					<x-sbdash.auth-session-status :class="'mb-4 small'" :status="Session::get('status')" />
				@endif
				
				<!-- Waybill Number -->
				<div class="mb-3 row">
					<div class="col-12 col-lg-6">
						<label class="form-label" for="waybill_no">Waybill Number</label>
						<input id="waybill_no" class="form-control" type="text" name="waybill_no" value="{{old('waybill_no')}}" required  />
					</div>
				</div>

				<div class="row">
					<!-- Date Issued -->
					<div class="mb-3 col-lg-3 col-8">
						<label class="form-label" for="date_issued">Date Issued</label>
						<input id="date_issued" class="form-control" type="date" name="date_issued" value="{{old('date_issued')}}" required  />
					</div>
					<!-- Deadline -->
					<div class="mb-3 col-lg-3 col-8">
						<label class="form-label" for="deadline">Deadline</label>
						<input id="deadline" class="form-control" type="date" name="deadline" value="{{old('deadline')}}"   />
					</div>
				</div>

				<!-- Quantity and Value -->
				<div class="row">
					<div class="mb-3 col-6 col-lg-1">
						<label class="form-label" for="quantity">Quantity</label>
						<input id="quantity" class="form-control" type="number" name="quantity" value="{{old('quantity')}}"  required  />
					</div>
					<div class="mb-3 col-6 col-lg-2">
						<label class="form-label" for="value">Value</label>
						<select id="value" class="form-select" name="value" required >
							<option value="">--Select--</option>
							<option value="pcs" {{old('value') == 'pcs' ? 'selected' : ''}}>pcs</option>
							<option value="sets" {{old('value') == 'sets' ? 'selected' : ''}}>sets</option>
						</select>
					</div>
				</div>

				<!-- Description -->
				<div class="mb-3 row">
					<div class="col-12 col-lg-6">
						<label class="form-label" for="description">Description</label>
						<textarea id="description" class="form-control" type="text" rows="4" name="description" placeholder="Enter order description here" required >{{old('description')}}</textarea>
					</div>
				</div>

				<!-- Customer Name -->
				<div class="mb-3 row">
					<div class="col-12 col-lg-6">
						<label class="form-label" for="customer_name">Customer Name</label>
						<input id="customer_name" class="form-control" type="text" name="customer_name" value="{{old('customer_name')}}" required  />
					</div>
				</div>

				<!-- Issued By -->
				<div class="mb-3 row">
					<div class="col-9 col-lg-4">
						<label class="form-label" for="issued_by">Issued By</label>
						<select id="issued_by" class="form-select" name="issued_by" required >
							<option value="">-- Issued By --</option>
							@foreach($contacts as $contact)
								<option value="{{$contact->id}}" {{old('issued_by') == $contact->id ? 'selected' : ''}}>{{ucwords($contact->name)}}</option>
							@endforeach
						</select>
					</div>
				</div>

				

				<!-- Submit -->
				<div class="mb-3 d-flex justify-content-start">
					<button type="submit" name="submit" class="btn btn-success">Save order</button>
				</div>
			</form>
		</div>
	</div>
</x-app-layout>

