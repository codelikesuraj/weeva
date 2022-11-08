<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Order management software tailored for aso-oke weavers" />
    <meta name="author" content="Weeva" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}" />

    <title>{{ $title }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-2 fs-2 text-light" href="{{ route('dashboard') }}">Weeva</a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-sm bg-lg-warning" id="sidebarToggle" href="#">
            <span class="text-light fs-6 p-0 d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                    class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </span>
        </button>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- Section -->
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} pb-2"
                            href="{{ route('dashboard') }}">
                            Dashboard
                        </a>

                        <!-- Orders -->
                        <a class="nav-link {{ request()->routeIs('order.*') ? 'active' : '' }} py-2" href="#"
                            data-bs-toggle="collapse" data-bs-target="#ordersMenu" aria-expanded="true"
                            aria-controls="collapseLayouts">
                            Orders
                            <div class="sb-sidenav-collapse-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                            </div>
                        </a>
                        <div class="show" id="ordersMenu" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link d-flex align-items-center {{ request()->routeIs('order.create') ? 'active' : '' }} py-2"
                                    href="{{ route('order.create') }}">Add new order
                                </a>
                                <a class="nav-link d-flex align-items-center {{ request()->routeIs('order.index') ? 'active' : '' }} py-2"
                                    href="{{ route('order.index') }}">View all orders
                                </a>
                                <a class="nav-link d-flex align-items-center {{ request()->routeIs('order.pending') ? 'active' : '' }} py-2"
                                    href="{{ route('order.pending') }}">Pending orders
                                </a>
                                <a class="nav-link d-flex align-items-center {{ request()->routeIs('order.completed') ? 'active' : '' }} py-2"
                                    href="{{ route('order.completed') }}">Completed orders
                                </a>
                                </a>
                                <a class="nav-link d-flex align-items-center {{ request()->routeIs('order.overdue') ? 'active' : '' }} py-2"
                                    href="{{ route('order.overdue') }}">Overdue orders
                                </a>
                            </nav>
                        </div>

                        <!-- Delivery -->
                        <a class="nav-link {{ request()->routeIs('deliveries.*') ? 'active' : '' }} py-2"
                            href="{{ route('deliveries.index') }}">
                            Deliveries
                        </a>

                        <!-- Contacts -->
                        <a class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }} py-2" href="#"
                            data-bs-toggle="collapse" data-bs-target="#contactsMenu" aria-expanded="true"
                            aria-controls="collapseLayouts">
                            Contacts
                            <div class="sb-sidenav-collapse-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                            </div>
                        </a>
                        <div class="show" id="contactsMenu" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link d-flex align-items-center {{ request()->routeIs('contact.create') ? 'active' : '' }} py-2"
                                    href="{{ route('contact.create') }}">Add new contact
                                </a>
                                <a class="nav-link {{ request()->routeIs('contact.index') ? 'active' : '' }} py-2"
                                    href="{{ route('contact.index') }}">View all contacts
                                </a>
                            </nav>
                        </div>

                        <!-- Section -->
                        <div class="sb-sidenav-menu-heading">Account</div>
                        <a class="nav-link" href="{{ route('logout') }}">
                            <div class="sb-nav-link-icon">
                            </div>Logout
                        </a>
                    </div>
                </div>

                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ ucwords(Auth::user()->name) }}
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-0 w-100">
                    {{ $slot }}
                </div>
            </main>

            <footer class="py-2 bg-light mt-auto">
                <div class="container-fluid d-flex align-items-center justify-content-center small">
                    <div class="row text-center">
                        <div class="col-12 text-muted mb-1">Copyright &copy;
                            {{ config('app.name', 'Weeva') . ' ' . date('Y') }}</div>
                        <div class="col-12 mb-1"> Designed and developed by <a class="text-muted" target="_blank"
                                href="https://github.com/codelikesuraj">Abdulbaki Suraj</a></div>
                        <div class="col-12 mb-1">Made with <a class="text-danger" target="_blank"
                                href="https://laravel.com">Laravel PHP</a></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script type="text/javascript">
        if ('serviceWorker' in navigator) {
            console.log("Will the serveice worker register?");
            navigator.serviceWorker.register('service-worker.js')
                .then(function(reg) {
                    console.log("Yes, it did.");
                })
                .catch(function(err) {
                    console.log("No, it didn't. This happened:", err)
                });
        }
    </script>
</body>

</html>
