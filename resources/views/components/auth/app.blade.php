<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Order management software tailored for aso-oke weavers" />
  <meta name="author" content="Weeva" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}}" />
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}" />
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}" />
  <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}" />  

  <title>{{$title}}</title>
  
  <link href="{{asset('css/app.css')}}" rel="stylesheet" />
  <script src="{{asset('js/app.js')}}"></script>
</head>

<body class="bg-light">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-7">
              <div class="card shadow-lg border-0 rounded-lg mt-4">
                {{$slot}}
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="p-3 px-1 bg-light mt-auto">
        <div class="container-fluid d-flex align-items-center justify-content-center small">
          <div class="row text-center">
            <div class="col-12 text-muted mb-1">Copyright &copy; {{config('app.name', 'Weeva').' '.date('Y')}}</div>
            <div class="col-12 mb-1">Designed and developed by <a class="text-muted" href="#">
            Abdulbaki Suraj</a></div>
            <div class="col-12 mb-1">Made with <a class="text-danger" target="_blank" href="https://laravel.com">Laravel PHP</a></div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</body>
</html>
