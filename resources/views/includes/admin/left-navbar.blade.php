  <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <a class="nav-link @if (Route::is('admin.posts.index')) active @endif"
              href="{{ route('admin.posts.index') }}">Posts</a>
      </li>
      <li class="nav-item">
          <a class="nav-link @if (Route::is('admin.users.index')) active @endif"
              href="{{ route('admin.users.index') }}">Utenti</a>
      </li>
  </ul>
