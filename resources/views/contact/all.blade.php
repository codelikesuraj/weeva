<x-app-layout>
	<x-slot name="title">
		Contacts
	</x-slot>

	<h1 class="m-4 mx-1">Contacts</h1>
	<a href="{{route('dashboard')}}" class="m-2 btn btn-outline-danger">Go back to dashboard</a>

	<div class="card mb-4">
		<div class="card-header">
			<h4 class="d-flex justify-content-between align-items-center">
				<div>
					<i class="fas fa-user me-1"></i>
					Contacts
				</div>
				<div>
					<!-- Button trigger modal -->
					<a class="btn btn-success" href="{{route('create-contact')}}">Add new</a>
				</div>
			</h4>
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
									<i class="small fas fa-pencil-alt"></i> Edit
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