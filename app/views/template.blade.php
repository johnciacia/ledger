<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ledger</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Raleway:500,400,300" type="text/css">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('head')
</head>
<body>

  @include('header')

  <div class="container">
    @yield('content')
  </div>

  @include('footer')

</body>
</html>
