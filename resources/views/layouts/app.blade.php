<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Order management software tailored for aso-oke weavers" />
	<meta name="author" content="Weeva" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png" />
  <link rel="manifest" href="/assets/favicon/site.webmanifest" />

	<title>{{$title}}</title>

	<link href="/css/app.css" rel="stylesheet" />
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="/js/app.js"></script>
</head>
<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<!-- Navbar Brand-->
		<a class="navbar-brand ps-2 fs-2 text-light" href="{{route('dashboard')}}">Weeva</a>
		<!-- Sidebar Toggle-->
		<button class="border border-gray border-3 rounded-3 btn btn-sm bg-lg-warning" id="sidebarToggle" href="#!">
			<!-- <i class="fas fa-bars"></i> -->
			<span class="text-light fs-6 p-1">Menu</span>
		</button>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark sb-sidenav-light" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<!-- Section -->
						<div class="sb-sidenav-menu-heading">Core</div>
						<a class="nav-link" href="{{route('dashboard')}}">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Dashboard
						</a>
						<!-- Orders -->
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#ordersMenu" aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
							Orders
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="ordersMenu" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="{{route('order')}}">
									<div class="sb-nav-link-icon">
										<i class="fas fa-plus"></i>
									</div>Add new order
								</a>
								<!-- <a class="nav-link" href="{{route('contacts')}}">
									<div class="sb-nav-link-icon">
										<i class="fas fa-hourglass"></i>
									</div>View pending orders
								</a> -->
							</nav>
						</div>
						<!-- Contacts -->
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#contactsMenu" aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
							Contacts
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="contactsMenu" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="{{route('create-contact')}}">
									<div class="sb-nav-link-icon">
										<i class="fas fa-plus"></i>
									</div>Add new contact
								</a>
								<a class="nav-link" href="{{route('contacts')}}">
									<div class="sb-nav-link-icon">
										<i class="fas fa-eye"></i>
									</div>View all contacts
								</a>
							</nav>
						</div>

						<!-- Section -->
						<div class="sb-sidenav-menu-heading">Account</div>
						<a class="nav-link" href="{{route('logout')}}">
							<div class="sb-nav-link-icon">
								<i class="fas fa-sign-out-alt"></i>
							</div>Logout
						</a>

						<!-- Section -->
						<!-- <div class="sb-sidenav-menu-heading">Menu Heading</div>
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
							Menu 1
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="#">Link 1</a>
								<a class="nav-link" href="#">Link 2</a>
							</nav>
						</div>
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
							<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
							Menu 2
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
								<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
									Sub-menu 1
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
									<nav class="sb-sidenav-menu-nested nav">
										<a class="nav-link" href="#">Link 1</a>
										<a class="nav-link" href="#">Link 2</a>
										<a class="nav-link" href="#">Link 3</a>
									</nav>
								</div>
								<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
									Sub-menu 2
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
									<nav class="sb-sidenav-menu-nested nav">
										<a class="nav-link" href="#">Link 1</a>
										<a class="nav-link" href="#">Link 2</a>
										<a class="nav-link" href="#">Link 3</a>
									</nav>
								</div>
							</nav>
						</div> -->
					</div>
				</div>
				<div class="sb-sidenav-footer">
					<div class="small">Logged in as:</div>
					{{ucwords(Auth::user()->name)}}
				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<main>
          <div class="container-fluid px-1">
				    {{$slot}}
          </div>
			</main>
			<footer class="py-4 bg-light mt-auto">
        <div class="container-fluid d-flex align-items-center justify-content-center small">
          <div class="row text-center">
            <div class="col-12 text-muted mb-1">Copyright &copy; {{config('app.name', 'Weeva').' '.date('Y')}}</div>
            <div class="col-12 mb-1"> Designed and developed by<br/><a class="text-muted" href="#">Abdulbaki Suraj</a></div>
          </div>
        </div>
      </footer>
		</div>
	</div>
</body>
</html>
