<!-- navber -->

<nav class="navbar navbar-expand-lg text-light" style="background-color: #1e3a8a;">
  <div class="container">
    <a class="navbar-brand text-light" href="#">SupNet</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light active" aria-current="page" href="/supply">Supply</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light active" aria-current="page" href="/posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light active" aria-current="page" href="/categories">Categories</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto text-light">
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> My dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>
                </li>
              </ul>
            </li>
                @else
        <li class="nav-item">
          <a href="/login" class="nav-link text-light"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
        @endauth
      </ul>

    </div>
  </div>
</nav>



