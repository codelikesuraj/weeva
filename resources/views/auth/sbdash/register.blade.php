<x-auth.app>
	<x-slot name="title">Register</x-slot>
	<div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
	<div class="card-body">
		
		<!-- Validation Errors -->
    	<x-sbdash.auth-validation-errors class="mb-4" :errors="$errors" />
    
		<form method="POST" action="{{ route('register') }}">
			@csrf
			<!-- Name -->
			<div class="form-floating mb-3">
				<input class="form-control" id="name" type="text" placeholder="name" required autofocus value="{{old('name')}}" name="name" />
				<label for="name">Name</label>
			</div>

			<!-- Phone Number -->
			<div class="form-floating mb-3">
				<input class="form-control" id="phone" type="text" placeholder="Phone Number" required autofocus value="{{old('phone')}}" name="phone"/>
				<label for="phone">Phone Number</label>
			</div>

			<!-- Email Address -->
			<div class="form-floating mb-3">
				<input class="form-control" id="email" type="text" placeholder="Email Address" required autofocus value="{{old('email')}}" name="email"/>
				<label for="email">Email Address</label>
			</div>

			<!-- Password -->
			<div class="row mb-3">
				<div class="col-md-6">
					<div class="form-floating mb-3 mb-md-0">
						<input class="form-control" id="password" type="password" placeholder="Create a password" name="password"/>
						<label for="password">Password</label>
					</div>
				</div>
				<!-- Confirm Password -->
				<div class="col-md-6">
					<div class="form-floating mb-3 mb-md-0">
						<input class="form-control" id="password_confirmation" type="password" placeholder="Confirm password" name="password_confirmation" />
						<label for="password_confirmation">Confirm Password</label>
					</div>
				</div>
			</div>

			<div class="mt-4 mb-0">
				<div class="d-grid">
					<button type="submit" class="btn btn-primary btn-block">Register</button>
				</div>
			</div>
		</form>
	</div>
	<div class="card-footer text-center py-3">
		<div class=""><a class="text-muted" href="{{ route('login') }}">Already registered? Go to login</a></div>
	</div>
</x-auth.app>