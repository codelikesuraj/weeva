<x-app-layout>
	<x-slot name="title">
		Contacts
	</x-slot>

	<h1 class="mt-4">Contacts</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Contacts</li>
	</ol>

	<div class="card mb-4">
		<div class="card-header">
			<h4 class="d-flex justify-content-between align-items-center">
				<div>
					<i class="fas fa-table me-1"></i>
					Contacts
				</div>
				<div>
					<!-- Button trigger modal -->
					<a class="btn btn-success" href="{{route('create-contact')}}">Add new</a>
				</div>
			</h4>
		</div>
		<div class="card-body">
			<table id="datatablesSimple">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Type</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Type</th>
						<th colspan="2">Action</th>
					</tr>
				</tfoot>
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
			</table>
		</div>
	</div>
</x-app-layout>