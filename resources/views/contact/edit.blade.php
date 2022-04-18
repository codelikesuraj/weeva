<x-app-layout>
	<x-slot name="title">
		Contacts | Edit
	</x-slot>

	<h1 class="m-4 mx-1">Contacts</h1>
	<a href="{{route('contacts')}}" class="mb-2 btn btn-danger">Go back to contacts</a>

	<div class="card mb-4">
		<div class="card-header">
			<h4 class="d-flex justify-content-between align-items-center">
				<div>
					<i class="fas fa-plus me-1"></i>
					Edit Contact
				</div>
			</h4>
		</div>

		<div class="card-body p-4">
			<form method="post" action="{{route('update-contact')}}">
				@csrf
				<!-- errors -->
				<x-sbdash.auth-validation-errors :class="'mb-4 small'" :errors="$errors" />

				<!-- Success messages -->
				@if (Session::has('status'))
					<x-sbdash.auth-session-status :class="'mb-4 small'" :status="Session::get('status')" />
				@endif

				<!-- Contact ID -->
				<input type="hidden" name="contact_id" value="{{old('contact_id') != null ? old('contact_id') : $contact->id}}">
				
				<!-- Name -->
				<div class="mb-3">
					<input class="form-control" id="name" type="text" name="name" value="{{old('name') != null ? old('name') : $contact->name}}" placeholder="Name" required />
				</div>

				<!-- Phone Number -->
				<div class="mb-3">
					<input class="form-control" id="phone" type="text" name="phone" value="{{old('phone') != null ? old('phone') : $contact->phone}}" placeholder="Phone Number"/>
				</div>

				<!-- Contact Type -->
				<div class="mb-3">
					<select id="type" class="form-select" name="type" required >
						<option value="">Select Contact Type</option>
						<option value="sales" {{ $contact->type == 'sales' || old('type') == 'sales' ? 'selected' : ''}}>Sales</option>
						<option value="weaver" {{ $contact->type == 'weaver' || old('type') == 'weaver' ? 'selected' : ''}}>Weaver</option>
					</select>
				</div>

				<!-- Submit or Cancel -->
				<div class="mb-3 d-flex justify-content-start">
					<button type="submit" name="submit" class="btn btn-success">Update</button>
				</div>
			</form>
		</div>
	</div>
</x-app-layout>
