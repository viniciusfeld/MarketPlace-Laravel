<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Obras Brasileiras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px;">

        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">Obras Brasileiras</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              @auth
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
                <a class="nav-link" aria-current="page" href="{{route('admin.stores.index')}}">Lojas</a>
              </li>
              <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
              </li>
              <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
              </li>
              
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="#" onclick="event.preventDefault(); 
                                                document.querySelector('form.logout').submit(); ">Sair</a>
                      <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                        @csrf

                    </form>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link">{{auth()->user()->name}}</span>
                  </li>
              </ul>
            </div>
                @endauth
          </div>
        </div>
      </nav>
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>