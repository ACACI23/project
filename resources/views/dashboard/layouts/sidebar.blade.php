<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" {{ Request::is('dashboard/posts*') ? 'active' : '' }} href="/dashboard/posts">
            <span data-feather="file-text"></span>
             My Posts
          </a>
        </li>
      </ul>
    </div>

    @can('admin')
      <h6 class="sidebar-heading d-flex justify-contet align-items-center px-3 m4-4 mb-1">
        <span>Administator</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" {{ Request::is('dashboard/categories*') ? 'active' : '' }} href="/dashboard/categories">
            <span data-feather="grid"></span>
             Post Categories
          </a>
        </li>
      </ul>
      @endcan
  </nav>