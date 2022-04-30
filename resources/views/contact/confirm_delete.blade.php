<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact | Delete</title>
</head>
<body>
	<h1>Delete Contact</h1>
	<p>You are about to delete <strong>{{ucwords($contact->name)}}</strong> from your contacts list.</p>
	<p>If you continue, all orders associated with <strong>{{ucwords($contact->name)}}</strong> will be removed accordingly.</p>
	<p>
		Do you still wish to continue ?
		<form method="POST" action="{{route('delete-contact')}}">
			@csrf
			<input type="hidden" name="contact_id" value="{{$contact->id}}">
			<a href="{{route('contacts')}}">No</a> | 
			<input type="submit" name="submit" value="Yes, I am sure">
		</form>
	</p>
</body>
</html>