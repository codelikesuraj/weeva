<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <h1 class="m-4 mx-1">Dashboard</h1>
    <div class="card mb-4">
        <!-- Success messages -->
        @if (Session::has('status'))
            <x-sbdash.auth-session-status :class="'mb-4 small'" :status="Session::get('status')" />
        @endif

        <div class="d-flex justify-content-between align-items-center px-1">
            <div class="d-flex justify-content-start align-items-center">
                <h1 class="py-1">Orders</h1>
            </div>
            <div>
                <a href="{{ route('order.create') }}" class="btn btn-success p-1 px-2 small">Add</a>
            </div>
        </div>
        <div class="p-1">
            <div class="row">
                @if ($total_orders)
                    <div class="col-12 mb-2">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="col-12 col-sm">
                        <a href="#" class="card card-stats mb-2 mb-xl-0 text-decoration-none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total</h5>
                                        <span
                                            class="h2 font-weight-bold mb-0 text-dark">{{ number_format($total_orders) }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="card card-stats mb-2 mb-xl-0 text-decoration-none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Completed</h5>
                                        <span
                                            class="h2 font-weight-bold mb-0 text-success">{{ number_format($completed_orders) }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="card card-stats mb-2 mb-xl-0 text-decoration-none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Pending</h5>
                                        <span
                                            class="h2 font-weight-bold mb-0 text-warning">{{ number_format($pending_orders) }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @else
                    <div class="m-1">
                        @if ($contact_count < 1)
                            <p class="text-center">You don't have any <strong>sales</strong> contact saved yet
                                !!!<br />Click the button below to add one now </p>
                            <div class="d-flex justify-content-center"><a
                                    class="m-auto btn btn-info border-dark border-2 rounded-3"
                                    href="{{ route('contact.create') }}">Add Contact</a></div>
                        @else
                            <p>No orders yet !!!</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
        integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    type: 'bar',
                    label: 'Number of orders',
                    data: @json($data['data']),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        ticks: {
                            beginAtZero: true,
                            callback: function(value, index, ticks) {
                                if (Math.floor(value) === value) {
                                    return value;
                                }
                            },
                        },
                    },
                },
            }
        });
    </script>
</x-app-layout>
