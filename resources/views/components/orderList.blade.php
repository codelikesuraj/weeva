@props(['orders'])

@foreach ($orders as $order)
    <div class="shadow p-2 rounded bg-body my-2 border border-black">
        <div class="d-flex justify-content-between">
            <div>
                <strong>No:</strong>
                <a class="text-dark"
                    href="{{ route('order.waybillNo', [$order->waybill_no]) }}">{{ $order->waybill_no }}</a>
            </div>
            <div>
                <strong>From:</strong>
                <a class="text-dark" href="{{ route('order.issuedBy', [$order->issued_by]) }}">
                    {{ $order->issuedBy->name }}</a>
            </div>
        </div>
        <p class="my-1 p-2" style="background: #eeeeee;">
            <a href="{{ route('order.show', [$order->id]) }}" class="text-decoration-none text-body">
                {{ $order->quantity . ' ' . $order->value . ' of ' . $order->description }}
            </a>
        </p>
        <div class="d-flex justify-content-between">
            <div>
                @if (request()->routeIs(
                    'dashboard',
                    'order.index',
                    'order.pending',
                    'order.completed',
                    'order.waybillNo',
                    'order.issuedBy'))
                    @if ($order->status == 'pending')
                        <span class="bg-warning text-body px-1">
                            <a class="text-body" href="{{ route('order.pending') }}">{{ ucfirst($order->status) }}</a>
                        </span>
                    @else
                        <span class="bg-success text-white px-1">
                            <a class="text-white"
                                href="{{ route('order.completed') }}">{{ ucfirst($order->status) }}</a>
                        </span>
                    @endif
                @endif
            </div>
            <div>
                <strong>Customer:</strong>&nbsp;{{ ucwords($order->customer_name) }}
            </div>
        </div>
    </div>
@endforeach
