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

      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand"
            style="font-family: 'Gloria Hallelujah'; font-size: 30px;text-shadow: 4px 10px 4px #aaa;" href={{ route('index') }}>Job Search Ultra</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              @if (Auth::check())
                <li>Welcome, {{ Auth::user()->firstname }} {{ link_to_route('user.logout', "(log out)") }}</li> 
                <li>[{{ Auth::user()->category }}]</li>
                <li></li>
              @else
                <li>
                  {{ Form::open(array('action' => 'UserController@login')) }}
                  {{ Form::label('lblUsername', 'email: ') }}
                  {{ Form::text('email') }}
                  {{ Form::label('lblPassword', 'Password: ') }}
                  {{ Form::password('password') }}
                  {{ Form::submit('Login') }}
                  {{ Form::close() }}
                </li>
              @endif
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <div class="container">
      <div id="wrap">
        @if (Auth::check())
          <div class="col-lg-3">
            <div class="list-group">
              @if (Auth::user()->category == "Employer")
                <a href="{{ URL::to('employer') }}" class="list-group-item">View Employer Jobs</a>
                <a href="{{ URL::to('jobseeker') }}" class="list-group-item">View All Jobs</a>
              @elseif (Auth::user()->category == "Job Seeker")
                <a href="{{ URL::to('jobseeker') }}" class="list-group-item">View All Jobs</a>
              @endif
            </div>
          </div> <!-- end col lg 4 -->
          <div class="col-lg-9">
            @yield('content')
          </div> <!-- end col lg 8 -->
        @else
          <div class="col-lg-offset-1">
            @yield('content')
          </div> <!-- end col lg 12 -->
        @endif
      </div> <!-- end div wrap -->
    </div> <!-- end div container -->
        <div class="footer">
      <p class="text-muted credit">Anthony Guevara<br/>
        S2877416<br/>
        {{ link_to_route('readme.doc', 'Documentation') }}
    </div>
  </body>
</html>