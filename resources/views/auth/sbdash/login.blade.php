<x-auth.app>
	<x-slot name="title">Login</x-slot>
	<div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
	<div class="card-body">
		<!-- Session Status -->
    	<x-sbdash.auth-session-status class="mb-4" :status="session('status')" />

		<!-- Validation Errors -->
    	<x-sbdash.auth-validation-errors class="mb-4" :errors="$errors" />

		<form method="POST" action="{{ route('login') }}" autocomplete="off">
			@csrf

			<!-- Phone Number -->
			<div class="form-floating mb-3">
				<input class="form-control" id="phone" type="text" name="phone" placeholder="Phone Number" value="{{old('phone')}}"/>
				<label for="phone">Phone Number</label>
			</div>

			<!-- Password -->
			<div class="form-floating mb-3">
				<input class="form-control" id="password" type="password" name="password" placeholder="Password" required />
				<label for="password">Password</label>
			</div>

			<div class="row mx-0 mb-3 d-flex align-items-center">
				<!-- Remember Me -->
				<div class="col-6 p-0 text-left">
					<input class="form-check-input" id="remember_me" type="checkbox" name="remember" />
					<label class="form-check-label" for="remember_me">Remember me</label>
				</div>
				<!-- Forgot Password -->
				<div class="col-6 p-0 text-right d-flex justify-content-end">
					@if(Route::has('password.request'))
						<a class="text-muted" href="{{ route('password.request') }}">Forgot Password?</a>
					@endif
				</div>
			</div>

			<div class="mt-4 mb-0">
				<div class="d-grid">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</div>
		</form>
	</div>
	<div class="card-footer text-center py-3">
		<div><a class="text-muted" href="{{route('register')}}">Need an account? Sign up!</a></div>
	</div>
</x-auth.app>