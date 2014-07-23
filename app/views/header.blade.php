@section('header')
<header>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">

        <a class="navbar-brand" href="#">
          <span class="glyphicon glyphicon-stats"></span> Balances</a>
      </div>

      <div class="collapse navbar-collapse navbar-right">
        <ul class="nav navbar-nav">
          <li><a href="#" data-uv-trigger><i class="fa fa-map-marker"></i> Contact</a></li>
          @if ( Auth::check() )
            <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
          @else
            <li><a href="/login"><i class="fa fa-sign-out"></i> Login</a></li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
</header>
@show
