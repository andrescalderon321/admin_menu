<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="wrapper">

        <aside id="sidebar">
            <div class="d-flex">
                <button id="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">MENU INTERACTIVO</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fi fi-sr-home"></i>
                        <span>Inicio</span>
                    </a>

                </li>

                <li class="sidebar-item">
                    <a href="{{route('empleado')}}" class="sidebar-link">
                        <i class="fi fi-sr-user"></i>
                        <span>Empleados</span>
                    </a>

                </li>

                <li class="sidebar-item">
                    <a href="{{route('admin')}}" class="sidebar-link">
                        <i class="fi fi-sr-users"></i>
                        <span>Administradores</span>
                    </a>

                </li>

                <li class="sidebar-item">
                    <a href="{{route('menu')}}" class="sidebar-link">
                        <i class="fi fi-sr-utensils"></i>
                        <span>Menu de comidas </span>
                    </a>

                </li>

                <li class="sidebar-item">
                    <a href="{{route('inventario')}}" class="sidebar-link">
                        <i class="fi fi-sr-inventory-alt"></i>
                        <span>Inventarios</span>
                    </a>

                </li>

                <li class="sidebar-item">
                    <a href= "{{route('suscriptores')}}"class="sidebar-link">
                        <i class="fi fi-sr-users"></i>
                        <span>Suscriptores</span>
                    </a>

                </li>

                <li class="sidebar-item">
                    <a href="{{route('pedidos')}}" class="sidebar-link">
                        <i class="fi fi-sr-bell-ring"></i>
                        <span>Pedidos</span>
                    </a>

                </li>

                <li class="sidebar-item">
                    <a href="{{route('provedores')}}" class="sidebar-link">
                        <i class="fi fi-bs-supplier-alt"></i>
                        <span>Provedoores</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="Base_de_datos.html" class="sidebar-link">
                        <i class="fi fi-sr-database"></i>
                        <span>Base de datos</span>
                    </a>

                </li>

                <li class="sidebar-item">
                    <a href="{{route('ventas')}}" class="sidebar-link">
                        <i class="fi fi-sr-cart-shopping-fast"></i>
                        <span>Ventas</span>
                    </a>

                </li>

                <li class="sidebar-item">

                    <a class="sidebar-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fi fi-sr-sign-out-alt"></i>
                        <span>{{ __('Cerrar sesion ') }}</span>
                    </a>
                </li>
               
            </ul>

        </aside>

         {{-- navbar --}}

            <div class="main p-3">
                <div id="app">
                    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                        <div class="container">
                        
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav me-auto">
        
                                </ul>
        
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                     @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif
        
                                        @if (Route::has('register'))
                                         <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>
        
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                             onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                            {{ __('volver al inicio ') }}
                                                    </a>
        
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                             </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>
                <div class="text-center">
                    <h1>pagina inicio </h1>
                </div>
            </div>

        </div>

      
        

    </div>

   
   

    <script type="text/javascript"src="{{asset('js/script.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


  

    

    
  