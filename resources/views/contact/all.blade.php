<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contacts</title>
</head>
<body>
	<h1>Contacts</h1>
	<p><a href="{{route('create-contact')}}">Create</a></p>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Type</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			@if($contacts && $contacts->count()>=1)
				@foreach($contacts as $contact)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$contact->name}}</td>
						<td>{{$contact->phone ? $contact->phone : 'n/a'}}</td>
						<td>{{ucfirst($contact->type)}}</td>
						<td><a href="{{route('confirm-delete-contact', [$contact->id])}}">Delete</a></td>
					</tr>
				@endforeach
			@else
				<tr><td colspan="6">Wow! such empty</td></tr>
			@endif
		</tbody>
		<tfoot>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Type</th>
				<th colspan="2">Action</th>
			</tr>
		</tfoot>
	</table>
</body>
</html>