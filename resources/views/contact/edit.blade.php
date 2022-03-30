<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contacts | Edit</title>
</head>
<body>
	<h1>Edit</h1>
	<p><a href="{{route('contacts')}}">Back to contacts</a></p>
	<form method="POST" action="/contact/edit-contact">
		@csrf
		<x-auth-validation-errors class="mb-4" :errors="$errors" />
		<input type="hidden" name="contact_id" value="{{$contact->id ? $contact->id : old('id')}}">
		<input readonly type="text" name="name" required placeholder="name" value="{{$contact->name ? $contact->name : old('name')}}"><br/>
		<input type="phone" name="phone" placeholder="phone number" value="{{$contact->phone ? $contact->phone : old('phone')}}"><br/>
		<select name="type" required>
			<option value="">--select--</option>
			<option value="sales" {{ $contact->type == 'sales' || old('type') == 'sales' ? 'selected' : ''}}>Sales</option>
			<option value="weaver" {{ $contact->type == 'sales' || old('type') == 'sales' ? 'selected' : ''}}>Weaver</option>
		</select><br/>
		<input type="submit" name="submit" value="Update">
	</form>
</body>
</html>