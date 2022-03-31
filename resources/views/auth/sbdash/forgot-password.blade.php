<x-auth.app>
	<x-slot name="title">Forgot Password</x-slot>
	<div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
	<div class="card-body">
		<div class="small mb-3 text-muted">
			Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
		</div>

		<!-- Session Status -->
    <x-sbdash.auth-session-status class="mb-4" :status="session('status')" />

		<!-- Validation Errors -->
    <x-sbdash.auth-validation-errors class="mb-4" :errors="$errors" />

		<form method="POST" action="{{ route('password.email') }}">
      @csrf

      <!-- Email Address -->
			<div class="form-floating mb-3">
				<input class="form-control" id="email" type="email" placeholder="name@example.com" name="email" value="{{old('email')}}" required autofocus/>
				<label for="email">Email address</label>
			</div>

			<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
				<a class="" href="{{route('login')}}">Return to login</a>
				<button class="btn btn-primary" type="submit">Reset Password</button>
			</div>
		</form>
	</div>
	<div class="card-footer text-center py-3">
		<div class=""><a href="{{route('register')}}">Need an account? Sign up!</a></div>
	</div>
</x-auth.app>