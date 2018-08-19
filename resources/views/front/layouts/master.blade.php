
<!DOCTYPE html>
<html lang="my-MM">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('front.layouts._partials.seo')
    <title>@yield('title') - MawGyunCity Family</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ mix('css/front.css') }}">

  </head>

  <body>

    @include('front.layouts.nav')

    <!-- Page Content -->
    <div class="container">

      @yield('content')

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script defer src="{{ mix('js/front.js') }}"></script>

  </body>

</html>
