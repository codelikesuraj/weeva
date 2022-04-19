<x-app-layout>
	<x-slot name="title">
		Contacts
	</x-slot>

	<h1 class="m-4 mx-1">Contacts</h1>
	<a href="{{route('dashboard')}}" class="m-2 btn btn-outline-danger">Go back to dashboard</a>

	<div class="card mb-4">
		<div class="card-header">
			<h3 class="d-flex justify-content-between align-items-center">
				<div>
					<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
						<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
					</svg>
					Contacts
				</div>
				<div>
					<!-- Button trigger modal -->
					<a class="btn btn-success" href="{{route('create-contact')}}">Add new</a>
				</div>
			</h3>
		</div>
		<div class="card-body p-0 m-0">
			<div class="table-responsive">
				<table class="text-center table table-bordered border-dark table-striped table-responsive table-sm align-middle">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Type</th>
							<th>Action</th>
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
							<td>
								<a class="text-danger text-decoration-none" href="{{route('edit-contact', [$contact->id])}}">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
									  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
									</svg> Edit
								</a>
							</td>
						</tr>
						@endforeach
						@else
						<tr><td colspan="6">Wow! such empty</td></tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</x-app-layout>