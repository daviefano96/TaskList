<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page"  href="{{ url('dashboard') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">Profile</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('viewtasklist') }}">View Tasks</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
      </ul>
      <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">             
      @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link outline-success">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Log out</span>
                        </a>
      </form>
    </div>
  </div>
</nav>
