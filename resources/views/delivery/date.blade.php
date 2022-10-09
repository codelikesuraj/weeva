<x-app-layout>
    <x-slot name="title">Delivery date: {{ date('j-M-y', strtotime($date)) }}</x-slot>

    <h1 class="m-4 mx-1">Delivery date: {{ date('D, d-M-Y', strtotime($date)) }}</h1>

    <a href="{{ route('deliveries.index') }}" class="mb-2 mx-2 btn btn-outline-danger">Go back to deliveries</a>

    <div class="card-header d-flex justify-content-start align-items-center mx-auto rounded border border-black">
        <div class="align-self-center fs-4">
            Deliveries ({{ $deliveries->count() > 0 ? $deliveries->count() : '0' }})
        </div>
    </div>

    <div class="p-1 mx-auto">
        <!-- Success messages -->
        @if (Session::has('status'))
            <x-sbdash.auth-session-status :class="'mb-4 small'" :status="Session::get('status')" />
        @endif

        @forelse ($deliveries as $delivery)
            <div class="shadow p-2 rounded bg-body my-2 border border-black">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>No:&nbsp;</strong>
                        <a class="text-dark"
                            href="{{ route('order.waybillNo', [$delivery->orderInfo->waybill_no]) }}">{{ $delivery->orderInfo->waybill_no }}</a>
                    </div>
                    <div>
                        <strong>From:</strong>
                        <a class="text-dark"
                            href="{{ route('order.issuedBy', [$delivery->orderInfo->issued_by]) }}">{{ $delivery->orderInfo->issuedBy->name }}</a>
                    </div>
                </div>

                <div class="my-1 p-2" style="background: #eeeeee;">
                    <a href="{{ route('order.show', [$delivery->orderInfo->id]) }}"
                        class="text-decoration-none text-body">
                        {{ $delivery->quantity . ' ' . $delivery->value . ' of ' . $delivery->orderInfo->description }}
                    </a>
                </div>

                <div class="d-flex justify-content-end">
                    <strong>Customer:&nbsp;</strong>{{ ucwords($delivery->orderInfo->customer_name) }}
                </div>

                <div class="mt-2 mb-1 d-flex justify-content-end">
                    <!-- Delete delivery button -->
                    <button type="button" class="small btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteDelivery{{ $delivery->id }}">Delete</button>

                    <!-- Delete delivery modal -->
                    <div class="modal fade" id="deleteDelivery{{ $delivery->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete delivery</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <p>Before you continue, know that this action cannot be undone.</p>
                                    <p>Are you still sure you want to delete this delivery?</p>
                                    <form method="post" action="{{ route('deliveries.delete') }}">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="delivery_id" value="{{ $delivery->id }}">
                                        <button type="button" class="btn btn-outline-success"
                                            data-bs-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-danger">Yes, I am very very
                                            sure</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="shadow p-2 rounded bg-body my-2 border border-black">
                <div class="d-flex justify-content-center align-items-center">
                    There are no deliveries on this day
                </div>
            </div>
        @endforelse
    </div>

</x-app-layout>
