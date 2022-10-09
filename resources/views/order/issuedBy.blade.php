<x-app-layout>
    <x-slot name="title">Issued By: {{ $issued_by }}</x-slot>

    <h1 class="m-4 mx-1">Issued By: {{ $issued_by }}</h1>

    <div class="card-header d-flex justify-content-between align-items-center mx-auto rounded border border-black">
        <div class="align-self-center fs-4">
            Orders ({{ $orders->count() }})
        </div>
    </div>

    <div class="p-1 mx-auto">
        <x-orderList :orders="$orders" />
    </div>
</x-app-layout>
