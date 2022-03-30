<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Create Order') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<!-- Validation Errors -->
					<x-auth-validation-errors class="mb-4" :errors="$errors" />

					<form method="POST" action="{{ route('order') }}">
						@csrf

						<!-- Waybill Number -->
						<div class="mt-4">
							<x-label for="waybill_no" :value="__('Waybill No')" />

							<x-input id="waybill_no" class="block mt-1 w-full" type="text" name="waybill_no" :value="old('waybill_no')" required autofocus />
						</div>

						<!-- Date Issued -->
						<div class="mt-4">
							<x-label for="date_issued" :value="__('Date Issued')" />

							<x-input id="date_issued" class="block mt-1 w-full" type="date" name="date_issued" :value="old('date_issued')" required autofocus />
						</div>

						<!-- Quantity and Value -->
						<div class="flex items-center justify-start mt-4">
							<div>
								<x-label for="quantity" :value="__('Quantity')" />

								<x-input id="quantity" class="block mt-1" type="number" name="quantity" :value="old('quantity')" placeholder="1" required autofocus />
							</div>
							<div>
								<x-label for="Value" :value="__('Value')" />

								<x-select id="value" class="block mt-1 w-full" name="value" required autofocus>
									<option value="" default>--select--</option>
									<option value="pcs">pcs</option>
									<option value="sets">sets</option>
								</x-select>
							</div>
						</div>

						<!-- Description -->
						<div class="mt-4">
							<x-label for="description" :value="__('Description')" />

							<x-textarea id="description" class="block mt-1 w-full" type="text" rows="4" name="description" required autofocus>{{old('description')}}</x-textarea>
						</div>

						<!-- Customer Name -->
						<div class="mt-4">
							<x-label for="customer_name" :value="__('Customer Name')" />

							<x-input id="customer_name" class="block mt-1 w-full" type="text" name="customer_name" :value="old('customer_name')" required autofocus />
						</div>

						<!-- Issued By -->
						<div class="mt-4">
							<x-label for="issued_by" :value="__('Issued By')" />

								<x-select id="issued_by" class="block mt-1 w-full" name="issued_by" required autofocus>
									<option value="" default>--select--</option>
									@foreach($contacts as $contact)
										<option value="{{$contact->id}}">{{ucwords($contact->name)}}</option>
									@endforeach
								</x-select>
						</div>

						<!-- Deadline -->
						<div class="mt-4">
							<x-label for="deadline" :value="__('Deadline')" />

							<x-input id="deadline" class="block mt-1 w-full" type="date" name="deadline" :value="old('deadline')" required autofocus />
						</div>

						<div class="flex items-center justify-end mt-4">

							<x-button class="ml-4">
								{{ __('Save') }}
							</x-button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
