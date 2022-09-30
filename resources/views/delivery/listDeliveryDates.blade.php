<x-app-layout>
    <x-slot name="title">Delivery dates</x-slot>

    <h1 class="m-4 mx-1">Delivery dates</h1>
    <a href="{{ route('order.index') }}" class="m-2 btn btn-outline-danger">Go back to orders</a>

    <div class="card mb-4">
        <div class="card-header">
            <h3 class="d-flex justify-content-start align-items-center">
                <span class="ms-2">Deliveries</span>
            </h3>
        </div>

        <div class="card-body p-1">
            @if (!is_null($deliveries) && $deliveries->count() > 0)
                @foreach ($deliveries as $delivery)
                    <a class="text-dark text-decoration-none"
                        href="{{ route('deliveries.date', [date('Y', strtotime($delivery->date_delivered)), date('m', strtotime($delivery->date_delivered)), date('d', strtotime($delivery->date_delivered))]) }}">
                        <div class="mx-1 px-1 mt-2 text-center">
                            {{ date('l, M-d-Y', strtotime($delivery->date_delivered)) }}
                        </div>
                        <hr class="my-3">
                    </a>
                @endforeach
            @else
                <p class="mx-2 mt-2">No deliveries yet !!!</p>
            @endif
        </div>
    </div>
</x-app-layout>
