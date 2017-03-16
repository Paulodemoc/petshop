<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Pet Shop Smart</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  {{ Html::style('css/bootstrap.min.css') }}
  {{ Html::style('css/app.css') }}
  {{ Html::style('css/tether.min.css') }}

  <!-- JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/additional-methods.min.js"></script>
  <script src="js/localization/methods_pt.min.js"></script>
  <script src="js/localization/messages_pt_BR.js"></script>

  <script>
    window.Laravel = {
      !!json_encode([
        'csrfToken' => csrf_token(),
      ]) !!
    };
  </script>
</head>

<body>
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <a class="navbar-brand" href="#">PetShopSmart</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Início</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/produtos/carrinho') }}">Meu Carrinho</a>
      </li>
    </ul>
  </nav>

  <div class="container">
    @yield('content')
  </div>
  <!-- /.container -->
</body>

</html>
