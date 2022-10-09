<x-app-layout>
    <x-slot name="title">Completed Orders</x-slot>

    <h1 class="m-4 mx-1">Completed orders</h1>

    <!-- Success messages -->
    @if (Session::has('status'))
        <x-sbdash.auth-session-status :class="'mb-4 small'" :status="Session::get('status')" />
    @endif

    <div class="card-header d-flex justify-content-between align-items-center mx-2 rounded border border-black">
        <div class="align-self-center fs-4">
            Completed ({{ $orders->count() > 0 ? $orders->count() : '0' }})
        </div>
        <div>
            <a href="{{ route('order.create') }}" class="btn btn-success p-1 px-2 small">Add</a>
        </div>
    </div>

    <div class="p-1 mx-1">
        @if ($orders && $orders->count() > 0)
            <x-orderList :orders="$orders" />
        @else
            <div class="shadow p-2 rounded bg-body my-2 border border-black">
                <div class="d-flex justify-content-center align-items-center">
                    @if ($contact_count < 1)
                        <div class="row">
                            <p class="text-center">You don't have any <strong>sales</strong> contact saved yet
                                !!!<br />Click the button below to add one now </p>
                            <div class="d-flex justify-content-center"><a
                                    class="m-auto btn btn-info border-dark border-2 rounded-3"
                                    href="{{ route('contact.create') }}">Add Contact</a></div>
                        </div>
                    @else
                        No completed orders yet !!!
                    @endif
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
