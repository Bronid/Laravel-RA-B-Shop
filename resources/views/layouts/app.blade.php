<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>{{ config('app.name', 'RA&B Shop') }}</title>
        @livewireStyles
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body>
    @livewireStyles
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('index') }}">RA&B</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @if(Route::is('index') || Route::is('search'))
      @livewire('header-search-component')
      @endif
      <div id="navbarSupportedContent">
        <ul class="navbar-nav me-auto justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('cart') }}"><img class="nav-ico-2" src="images/icons/cart.png"></img></a>
          </li>
          @auth
          @if(Auth::user()->role == "admin")
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}"><img class="nav-ico-2"
                src="../../images/icons/account.png"></img></a>
          </li>
          @else
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('user.dashboard') }}"><img class="nav-ico-2"
                src="../../images/icons/account.png"></img></a>
          </li>
          @endif
          <li class="nav-item">
          <form method="POST" action="{{route('logout')}}">
            @csrf
            <a class="nav-link active" aria-current="page" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
              <img class="nav-ico-2"src="../../images/icons/account.png"></img>
            </a>
              </form>
          </li>
          </ul>
      </div>
          @else
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('register') }}"><img class="nav-ico-2"
                src="../../images/icons/account.png"></img></a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    @livewireScripts
    </body>
</html>