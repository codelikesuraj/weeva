<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Order management software tailored for aso-oke weavers" />
  <meta name="author" content="Weeva" />

  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="/assets/favicon/site.webmanifest">

  <title>{{$title}}</title>
  
  <link href="/css/app.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
      <footer class="p-3 bg-light mt-auto">
        <div class="container-fluid d-flex align-items-center justify-content-center small">
          <div class="row text-center">
            <div class="col-12 text-muted mb-1">Copyright &copy; {{config('app.name', 'Weeva').' '.date('Y')}}</div>
            <div class="col-12 mb-1"> Designed and developed by<br/><a class="text-muted" href="#">Abdulbaki Suraj</a></div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="/assets/js/scripts.js"></script>
</body>
</html>
