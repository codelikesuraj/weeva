<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contacts | Create</title>
</head>
<body>
	<h1>Create</h1>
	<p><a href="{{route('contacts')}}">Back to contacts</a></p>
	<form method="post" action="{{route('create-contact')}}">
		@csrf
		<x-auth-validation-errors class="mb-4" :errors="$errors" />
		<input type="text" name="name" required placeholder="name" value="{{old('name')}}"><br/>
		<input type="phone" name="phone" placeholder="phone number" value="{{old('phone')}}"><br/>
		<select name="type" required>
			<option value="">--select--</option>
			<option value="sales">Sales</option>
			<option value="weaver">Weaver</option>
		</select><br/>
		<input type="submit" name="submit" value="Create">
	</form>
</body>
</html>