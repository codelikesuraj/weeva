<x-app-layout>
	<x-slot name="title">
		Contacts | Create
	</x-slot>

	<h1 class="mt-4">Contacts</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Contacts</li>
	</ol>
	<a href="{{route('contacts')}}" class="mb-2 btn btn-danger">Go back to contacts</a>

	<div class="card mb-4">
		<div class="card-header">
			<h4 class="d-flex justify-content-between align-items-center">
				<div>
					<i class="fas fa-user me-1"></i>
					Create Contact
				</div>
			</h4>
		</div>

		<div class="card-body p-4">
			<form method="post" action="{{route('create-contact')}}">
				@csrf
				<!-- errors -->
				<x-sbdash.auth-validation-errors :class="'mb-4 small'" :errors="$errors" />

				<!-- Name -->
				<div class="mb-3">
					<input class="form-control" id="name" type="text" placeholder="Name" required autofocus value="{{old('name')}}" name="name" />
				</div>

				<!-- Phone Number -->
				<div class="mb-3">
					<input class="form-control" id="phone" type="text" placeholder="Phone Number" required autofocus value="{{old('phone')}}" name="phone"/>
				</div>

				<!-- Contact Type -->
				<div class="mb-3">
					<select id="type" class="form-select" name="type" required >
						<option value="">Select Contact Type</option>
						<option value="sales">Sales</option>
						<option value="weaver">Weaver</option>
					</select>
				</div>

				<!-- Submit or Cancel -->
				<div class="mb-3 d-flex justify-content-start">
					<button type="submit" name="submit" class="btn btn-success">Create</button>
				</div>
			</form>
		</div>
	</div>
</x-app-layout>