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
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
					  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
					</svg>
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
