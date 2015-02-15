<html>
  <head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Shadows+Into+Light">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> 
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">   
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css'); }}">
  </head>
  <body>
    <div class="container">
      <div id="wrap">
        <div class="col-lg-12">
              @yield('content')
        </div> <!-- end col lg 12 -->
      </div>
    </div> <!-- end class container -->
    <div class="footer">
      <p class="text-muted credit">Anthony Guevara<br/>
        S2877416<br/>
        {{ link_to_route('readme.doc', 'Documentation') }}
    </div>
  </body>
</html>