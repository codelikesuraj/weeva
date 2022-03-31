<x-auth.app>
	<x-slot name="title">Forgot Password</x-slot>
	<div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
	<div class="card-body">

		<!-- Validation Errors -->
    <x-sbdash.auth-validation-errors class="mb-4" :errors="$errors" />

		<form method="POST" action="{{ route('password.update') }}">
      @csrf

      <!-- Password Reset Token -->
      <input type="hidden" name="token" value="{{$request->route('token')}}">

      <!-- Email Address -->
			<div class="form-floating mb-3">
				<input class="form-control" id="email" type="email" placeholder="name@example.com" name="email" value="{{old('email', $request->email)}}" required autofocus/>
				<label for="email">Email address</label>
			</div>

			<!-- Password -->
			<div class="row mb-3">
				<div class="col-md-6">
					<div class="form-floating mb-3 mb-md-0">
						<input class="form-control" id="password" type="password" placeholder="Password" name="password" required />
						<label for="password">Password</label>
					</div>
				</div>
				<!-- Confirm Password -->
				<div class="col-md-6">
					<div class="form-floating mb-3 mb-md-0">
						<input class="form-control" id="password_confirmation" type="password" placeholder="Confirm password" name="password_confirmation" required/>
						<label for="password_confirmation">Confirm Password</label>
					</div>
				</div>
			</div>

			<div class="mt-4 mb-0">
				<div class="d-grid">
					<button type="submit" class="btn btn-primary">Reset Password</button>
				</div>
			</div>
		</form>
	</div>
</x-auth.app>