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
                    <a href="{{route('inventario')}}" class="sidebar-link">
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
                    <a href="#" class="sidebar-link">
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


                    <style>
                        .custom-alert-primary {
                            color: white !important;
                            background-color: #00050a; !important;
                            padding: 5px; /* Ajusta el padding a tu preferencia */
                            margin: 0 auto; /* Ajusta el margin si es necesario */
                        }
                    </style>


                    <h1 class="text-center alert alert-primary custom-alert-primary">Pedidos</h1>   
                <div class="text-firts">
                    <br><br>

                    <button type="button" class="btn btn-dark " data-bs-toggle="modal" data-bs-target="#create">Nuevo</button>
                    <br><br>
                        <div class="text-firts">

                            <table
                            class="table"
                        >
                            <thead
                            class="bg-dark text-white"
                            >
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Mesa </th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha de pedido</th>
                                    <th scope="col">Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;                
                                @endphp
                                @foreach ($ordenes as $orden)
                    
                                <tr>
                                    {{-- el modelo table viene la funcion tabla que es para llamar a name  --}}
                    
                                    <td scope="row">{{$i++}}</td>
                                    <td >{{$orden->Tabla->name}}</td>
                                    <td >{{$orden->estado}}</td>
                                    <td >{{$orden->fecha_de_pedido}}</td>
                                    <td >{{$orden->total}}</td>
                                   
                                    <td>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$orden->id}}">
                                        Editar
                                    </button>
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$orden->id}}" >
                                        Eliminar
                                    </button>

                                    <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#accion{{$orden->id}}">
                                        Accion
                                    </button>
                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#accion{{$orden->id}}">
                                        Factura
                                    </button>
                                   
                                   
                                </tr>
                               
                                {{-- create modal --}}

                                <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar mesa</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                
                                        <form action="{{route('create_order')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                <label for="" class="form-label">Nombre de mesa</label>
                                                <select name="table_id" id="" class="form-control">
                                                    @foreach($mesas as $mesa)
                                                    <option value="{{$mesa->id}}">{{$mesa->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                          <div class="mb-3">
                                            <label for="" class="form-label">Estado</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="estado"
                                                id=""
                                                aria-describedby="helpId"
                                                placeholder=""
                                            />
                                          </div>
                                          <div class="mb-3">
                                            <label for="" class="form-label">Fecha de pedido</label>
                                            <input
                                                type="datetime-local"
                                                class="form-control"
                                                name="fecha_de_pedido"
                                                id=""
                                                aria-describedby="helpId"
                                                placeholder=""
                                            />
                                          </div>

                                          <div class="mb-3">
                                            <label for="" class="form-label">Total</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="total"
                                                id=""
                                                aria-describedby="helpId"
                                                placeholder=""
                                            />
                                          </div>
                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>

                                       
                                        </form>
                                      </div>
                                    </div>
                                </div>

                                  {{-- modal edit --}}
                                   
                                 <div class="modal fade" id="edit{{$orden->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('update_order',$orden->id)}}" method="POST">
                                                        @csrf
                                                    <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Id</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" value="{{$orden->id}}">
                                                    </div> 
    
                                                    <div class="mb-3">

                                                        <label for="" class="form-label">Mesa</label>
                                                            <select name="table_id" id="" class="form-control">
                                                                @foreach($mesas as $mesa)
                                                                @if($mesa->id == $orden->mesa_id)
                                                                <option value="{{$mesa->id}}" selected>{{$mesa->name}}</option>
                                                                @else
                                                                <option value="{{$mesa->id}}">{{$mesa->name}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                   
                                                    </div> 
                                                    <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Estado</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1" name="estado" value="{{$orden->estado}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Fecha de pedido</label>
                                                        <input type="text" class="form-control" id="exampleInputPassword1" name="fecha_de_pedido" value="{{$orden->fecha_de_pedido}}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Total</label>
                                                        <input type="text" class="form-control" id="exampleInputPassword1" name="total" value="{{$orden->total}}">
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

                                {{-- modal delete --}}

                                <div class="modal fade" id="delete{{$orden->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registros</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                
                                    <form action="{{route('delete_order',$orden->id)}}" method="GET">
                                            @csrf
                                    
                                        <div class="modal-body">
                                         
                                            {{-- ESTAS SEGURO DE ELIMINAR <strong>{{$mesa->name}}?</strong> --}}
                                            <h3>Vas a eliminar este registro ? </h3>
                                
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                          <button type="submit" class="btn btn-primary">CONFIRMAR</button>
                                          {{-- <a  href="{{route("delete_order",$mesa->id)}}" class="btn btn-danger "> <i class="bi bi-trash">Eliminar</i></a> --}}
                                        </div>
                                    </form>
                                      </div>
                                    </div>
                                  </div>
                                
                                        
                                           
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

      
        

    </div>

   
   

    <script type="text/javascript"src="{{asset('js/script.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


  

    

    
  