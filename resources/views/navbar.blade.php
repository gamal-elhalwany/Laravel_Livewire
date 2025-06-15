<nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3">
  <a class="navbar-brand" href="/" wire:navigate>
    <img src="{{asset('favico.ico')}}">
  </a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('home') }}" wire:navigate>Home</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Welcome <strong>{{auth()->user()->name ?? 'Guest'}}</strong></a>
      <ul class="dropdown-menu p-0">
        <li>
          <form method="POST" action="{{ route('logout') }}" style="text-align:center;">
              @csrf
              <button type="submit" style="background:none; border:none; padding:5px;">Log Out</button>
          </form>
        </li>
      </ul>
    </li>
  </ul>
</nav>