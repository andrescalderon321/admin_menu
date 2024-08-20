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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
                    <a href="{{route('home')}}" class="sidebar-link">
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
                    <a href="#" class="sidebar-link">
                        <i class="fi fi-sr-inventory-alt"></i>
                        <span>Inventarios</span>
                    </a>

                </li>

                <li class="sidebar-item">
                    <a href="{{route('suscriptores')}}" class="sidebar-link">
                        <i class="fi fi-sr-users"></i>
                        <span>Suscriptores</span>
                    </a>

                </li>

                <li class="sidebar-item">
                    <a href="{{route('ordenes')}}" class="sidebar-link">
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
                    <a href="{{route('mesas')}}" class="sidebar-link">
                        <i class="fi fi-sr-database"></i>
                        <span>Mesas</span>
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
                {{-- crud de inventarios  --}}

                <style>
                    .custom-alert-primary {
                        color: white !important;
                        background-color: #00050a; !important;
                        padding: 5px; /* Ajusta el padding a tu preferencia */
                        margin: 0 auto; /* Ajusta el margin si es necesario */
                    }
                </style>

                <h1 class="text-center alert alert-primary custom-alert-primary">Inventarios</h1>

                @if(session("correcto"))
                <div class="alert alert-success">{{session("correcto")}}</div>
                @endif

                @if(session("incorrecto"))
                <div class="alert alert-danger">{{session("incorrecto")}}</div>
                @endif


                <div class="row col-12 p-4">
                    
                    <form action="{{route('create_inv')}}" method="POST" class="col-3 p-2 " >
                        @csrf
                     <div class="text-center alert alert-primary custom-alert-primary">Registro de productos </div>

    
                        <div class="mb-3">
                            <label class="form-label">Nombre producto</label>
                            <input type="text" class="form-control" name="producto_nombre">
                        </div>
    
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Cantidad disponible</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="cantidad">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Descripcion</label>
                            <input type="text" class="form-control" name="descripcion">
                        </div>
                
    
                          <div class="mb-3">
                            <label class="form-label">Precio de compra</label>
                            <input type="text" class="form-control" name="compra">
                          </div>

                          <div class="mb-3">
                            <label class="form-label">Precio de venta</label>
                            <input type="text" class="form-control" name="venta">
                          </div>

                          

                          <div class="mb-3">
                            <label class="form-label">Existencia</label>
                            <input type="text" class="form-control" name="existencia">
                          </div>

                          <button class="btn btn-success ">Agregar al inventario</button>
    
                    </form>
                    
                    <table class="table table-striped table-bordered table-hover col p-4 ">
                      
                        <thead class="bg-ingo text-white ">
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre producto</th>
                            <th scope="col">Cantidad disponible</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Precio de compra</th>
                            <th scope="col">Precio de venta</th>
                            <th scope="col">Existencia</th>
                            <th></th>
                            
                           
                            
                          </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($inventarios as $item)
                            <tr>
                                <th>{{$item->id}}</th>
                                <td>{{$item->nombre_producto}}</td>
                                <td>{{$item->cantidad_disponible}}</td>
                                <td>{{$item->descripcion}}</td>
                                <td>{{$item->precio_compra}}</td>
                                <td>{{$item->precio_venta}}</td>
                                <td>{{$item->existencia}}</td>

                                <td><a  href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id}}" class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i></a></td>
                                <td><a  href="{{route("delete_inv",$item->id)}}" class="btn btn-danger btn-sm"> <i class="bi bi-trash"></i></a></td>

                                        <!-- Button trigger modal -->

                                        <!-- Modal de modificar datos  -->
                        <div class="modal fade" id="modalEditar{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('update_inv')}}" method="POST">
                                                @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Id</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" value="{{$item->id}}">
                                            </div> 

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nombre del producto</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="producto_nombre" value="{{$item->nombre_producto}}">
                                            </div> 
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Cantidad disponible</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="cantidad" value="{{$item->cantidad_disponible}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                                                <input type="text" class="form-control p-2" id="exampleInputPassword1" name="descripcion"value="{{$item->descripcion}}">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Precio compra</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="compra"value="{{$item->precio_compra}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Precio de venta</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="venta"value="{{$item->precio_venta}}">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Exixtencia</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="existencia"value="{{$item->existencia}}">
                                            </div>
    
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Modificar</button>
                                            </div>
            
                                        </form>
                                    </div>   
                                </div>
                            </div>
                        </div>
                                
                            </tr>
                             
                            @endforeach
                         
                        </tbody>
                    </table>

                </div>
          
        </div>

    </div>

</div>




<script type="text/javascript"src="{{asset('js/script.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

            </div>

        </div>

      
        

    </div>

   
   

    <script type="text/javascript"src="{{asset('js/script.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


  

    

    
  