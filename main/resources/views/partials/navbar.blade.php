<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">Laravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">Home</a>
          <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a>
          <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts ">Blog</a>   
          <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories ">Categories</a>   
        </div>

        @auth
        <div class="navbar-nav dropdown ms-auto">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-columns"></i>  My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <form action="/logout" method="post">
              @csrf
              <li><button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-in-left"></i> Logout</button></li>
            </form>
          </ul>
        </div>

        @else
        <div class="navbar-nav ms-auto">
          <a class="nav-link {{ ($active === "login") ? 'active' : '' }} " href="/login "><i class="bi bi-box-arrow-in-right"></i> Login</a>   
        </div>
        @endauth

      </div>
    </div>
  </nav>