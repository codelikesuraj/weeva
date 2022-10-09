<x-app-layout>
    <x-slot name="title">Delivery dates</x-slot>

    <h1 class="m-4 mx-1">Delivery dates</h1>

    <a href="{{ route('order.index') }}" class="mb-2 mx-2 btn btn-outline-danger">Go back to orders</a>

    <div class="card-header d-flex justify-content-between align-items-center mx-2 rounded border border-black">
        <div class="align-self-center fs-4">
            Deliveries
        </div>
    </div>

    <div class="p-1 mx-1">
        @forelse($deliveries as $delivery)
            <a class="text-dark text-decoration-none"
                href="{{ route('deliveries.date', [date('Y', strtotime($delivery->date_delivered)), date('m', strtotime($delivery->date_delivered)), date('d', strtotime($delivery->date_delivered))]) }}">
                <div class="shadow p-2 rounded bg-body my-2 border border-black">
                    <div class="d-flex justify-content-center align-items-center py-2">
                        {{ date('l, M-d-Y', strtotime($delivery->date_delivered)) }}
                    </div>
                </div>
            </a>
        @empty
            <div class="shadow p-2 rounded bg-body my-2 border border-black">
                <div class="d-flex justify-content-center align-items-center">
                    No deliveries yet !!!
                </div>
            </div>
        @endforelse
    </div>
</x-app-layout>
