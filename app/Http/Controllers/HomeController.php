<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class HomeController extends Controller
{

    // crud empleados_______ 

    // la funcion empleados me llama los datos de la tabla empleados
    public function employees(){
        $datos=DB::select("SELECT * from employees;");
        return view('administrador.Empleados')->with("datos",$datos);
    }

    // la funcion menu me llama los datos de la tabla menu
    public function menu(){
        $menu=DB::select("SELECT * from products;");
        return view('administrador.menu_de_comidas')->with("menu",$menu);
    }

    // la funcion admins me llama los datos de la tabla admins

    public function admins(){
        $datos_admin=DB::select("SELECT * from users;");
        return view('administrador.admin')->with("datos_admin",$datos_admin);
    }

     // la funcion inventarios me llama los datos de la tabla inventarios
    public function inventory(){
        $inventarios=DB::select("SELECT * from inventories;");
        return view('administrador.inventarios')->with("inventarios",$inventarios);
    }

    public function supplier(){
        $proveedor=DB::select("SELECT * from suppliers;");
        return view('administrador.provedor')->with("proveedor",$proveedor);

    }

    public function tables1(){
        $mesas=table::all();
        return view('administrador.mesas',compact('mesas'));//cateroria tabla 
        }

    public function order(){
        

        $ordenes=Order::all();
        $mesas=Table::all();
        return view('administrador.pedidos',compact('mesas','ordenes'));
       
       
    }

    public function sale(){

        $ventas=DB::select("SELECT * from sales;");
        return view('administrador.ventas')->with("ventas",$ventas);
        }


    
        public function create_sale(Request $request)
        {
        //    el metodo try se utilza como una condicion el cual muestra un mensaje de error al registrar un empleado,si este no es registrado correctamente
            
                    try{
                        $sql=DB::select('insert into sales(monto_total)values(?)',[
                           
                            
                            $request->monto_total,
                            
                            
                         
                            ]);
    
                    }catch(\Throwable $th){
    
                        $sql =1;
    
                    }
              
            if($sql == false){
                return back()->with("correcto","Empleado fue regitrado exitosamente");
            }else{
                return back()->with("incorrecto","Error al registrar");
            }
    
        }


        public function update_sale(Request $request){

            // dd($request->all());
    
            try{
                $sql=DB::update("UPDATE sales SET monto_total = ?  WHERE id = ?",[
                   
                    $request->monto_total,
                    $request->id,
    
                    ]);
    
            }catch(\Throwable $th){
    
                $sql =0;
    
            }
      
            if($sql == true){
                return back()->with("correcto","Empleado fue mofificado exitosamente");
            }else{
                return back()->with("incorrecto","Error al modificar");
            }
    
        }


        public function delete_sale($id){

            try{
                $sql=DB::delete("delete from sales where id=$id");
                 
    
            }catch(\Throwable $th){
    
                $sql =0;
    
            }
      
            if($sql == true){
            return back()->with("correcto","venta fue eliminado exitosamente");
                }else{
            return back()->with("incorrecto","Error al eliminar ");
                
                }
            }


       

    public function create_table(Request $request)
    {
    //    el metodo try se utilza como una condicion el cual muestra un mensaje de error al registrar un empleado,si este no es registrado correctamente
        
                try{
                    $sql=DB::select('insert into tables(name,ubicacion)values(?,?)',[
                       
                        
                        $request->name,
                        $request->ubicacion,
                        
                     
                        ]);

                }catch(\Throwable $th){

                    $sql =1;

                }
          
        if($sql == false){
            return back()->with("correcto","Empleado fue regitrado exitosamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }
    
    public function create_order (Request $request)
    {
   
        $validatedData = $request->validate([
            'table_id' => 'required|exists:tables,id',
            'estado' => 'required|string|max:255',
            'fecha_de_pedido' => 'required|date',
            'total' => 'required|numeric',
        ]);

        // Crear el pedido
        $ordenes = new Order();
        $ordenes->table_id = $request->table_id;
        $ordenes->estado = $request->estado;
        $ordenes->fecha_de_pedido = $request->fecha_de_pedido;
        $ordenes->total = $request->total;
        $ordenes->save();
        return redirect()->back();

    
    }

    public function create(Request $request)
    {
    //    el metodo try se utilza como una condicion el cual muestra un mensaje de error al registrar un empleado,si este no es registrado correctamente
        
                try{
                    $sql=DB::select('insert into employees(name,rol,email,telefono)values(?,?,?,?)',[
                       
                        
                        $request->txtnombre,
                        $request->txtrol,
                        $request->txtemail,
                        $request->txttelefono,
                     

                        ]);

                }catch(\Throwable $th){

                    $sql =1;

                }
          
        if($sql == false){
            return back()->with("correcto","Empleado fue regitrado exitosamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // crud de administradores________ 
    
    

    // para crear los registros de admins
    public function create_admin(Request $request)
    {
    //    el metodo try se utilza como una condicion el cual muestra un mensaje de error al registrar un empleado,si este no es registrado correctamente
        
                try{
                    $sql=DB::select('insert into users(name,email,password)values(?,?,?)',[
                       
                        
                        $request->nombre,
                        $request->email,
                        $request->password,
                     

                        ]);

                }catch(\Throwable $th){

                    $sql =1;

                }
          
        if($sql == false){
            return back()->with("correcto","Se registro un nuevo administrador");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

   
    public function create_menu(Request $request)
    {
    //    el metodo try se utilza como una condicion el cual muestra un mensaje de error al registrar un empleado,si este no es registrado correctamente
        
                try{
                    $sql=DB::select('insert into products (name,precio,descripcion,disponibilidad)values(?,?,?,?)',[
                       
                        
                        $request->nombre,
                        $request->precio,
                        $request->descripcion,
                        $request->disponibilidad
                     

                        ]);

                }catch(\Throwable $th){

                    $sql =1;

                }
          
        if($sql == false){
            return back()->with("correcto","Se registro un nuevo administrador");
        }else{
            dd($th->getMessage());

            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function create_inv(Request $request)
    {
    //    el metodo try se utilza como una condicion el cual muestra un mensaje de error al registrar un empleado,si este no es registrado correctamente
        
                try{
                    $sql=DB::select('insert into inventories (nombre_producto,cantidad_disponible,descripcion,precio_compra,precio_venta,existencia)values(?,?,?,?,?,?)',[
                       
                        
                        $request->producto_nombre,
                        $request->cantidad,
                        $request->descripcion,
                        $request->compra,
                        $request->venta,
                        $request->existencia
                     

                        ]);

                }catch(\Throwable $th){

                    $sql =1;

                }
          
        if($sql == false){
            return back()->with("correcto","Registro exitoso");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function create_sup(Request $request)
    {
    //    el metodo try se utilza como una condicion el cual muestra un mensaje de error al registrar un empleado,si este no es registrado correctamente
        
    // dd($request->all());
                try{
                    $sql=DB::select('INSERT into suppliers (nombre_producto,nombre_de_la_empresa,correo,telefono,nombre_del_proveedor)values(?,?,?,?,?)',[
                       
                        $request->nombre_empresa,
                        $request->nombre_provedor,
                        $request->nombre_producto,
                        $request->correo,
                        $request->telefono,
                        
                     

                        ]);

                }catch(\Throwable $th){

                    $sql =1;

                }
          
        if($sql == false){
            return back()->with("correcto"," se creo un nuevo registro ");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function update_order(Request $request){

        // dd($request->all());

        try{
            $sql=DB::update("UPDATE orders SET estado = ?, fecha_de_pedido = ?, total = ? WHERE id = ?",[
               
               
                $request->estado,
                $request->fecha_de_pedido,
                $request->total,
                $request->id,

                ]);

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
            return back()->with("correcto","Empleado fue mofificado exitosamente");
        }else{
            return back()->with("incorrecto","Error al modificar");
        }

    }

    public function update(Request $request){

        try{
            $sql=DB::update(" update employees set name=?, rol=?, email=?, telefono=? where id=? ",[
               
                $request->txtnombre,
                $request->txtrol,
                $request->txtemail,
                $request->txttelefono,
                $request->txtid

                ]);

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
            return back()->with("correcto","Empleado fue mofificado exitosamente");
        }else{
            return back()->with("incorrecto","Error al modificar");
        }

    }
   



    public function update_admin(Request $request){

        // dd($request->all());


        try{
            $sql=DB::update("UPDATE users SET name = ?, email = ? WHERE id = ?", [
               
               
                        $request->name,
                        $request->email,
                        $request->id

                ]);

        }catch(\Throwable $th){

            $sql =1;

        }
  
        if($sql == true){
            return back()->with("correcto","Producto fue mofificado exitosamente");
        }else{
            return back()->with("incorrecto","Error al modificar");
        }

    }


    //aqui empiezan los updates

    public function update_menu(Request $request){

        try{
            $sql=DB::update(" update products set name=?, precio=?, descripcion=?, disponibilidad=? where id=? ",[
               
                $request->nombre,
                $request->precio,
                $request->descripcion,
                $request->disponibilidad,
                $request->id

                ]);

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
            return back()->with("correcto","Producto fue mofificado exitosamente");
        }else{
            return back()->with("incorrecto","Error al modificar");
        }

    }

    public function update_inv(Request $request){

        try{
            $sql=DB::update(" update inventories set nombre_producto=?, cantidad_disponible=?, descripcion=?,precio_compra=? ,precio_venta=? ,existencia=? where id=? ",[
               
               
                        $request->producto_nombre,
                        $request->cantidad,
                        $request->descripcion,
                        $request->compra,
                        $request->venta,
                        $request->existencia,
                        $request->id

                ]);

        }catch(\Throwable $th){

            // este comando me muestra los valores ingresados desde la request
            // dd($th->getMessage());

            $sql =0;

        }
  
        if($sql == true){
            return back()->with("correcto","Producto fue mofificado exitosamente");

        }else{
            return back()->with("incorrecto","Error al modificar");
        
        }

    }

    public function update_sup(Request $request){

        try{
            $sql=DB::update(" update suppliers  set  nombre_de_la_empresa=?,nombre_del_proveedor=? nombre_producto=?,correo=?, telefono=? , where id=? ",[
               
               
                        $request->nombre_empresa,
                        $request->nombre_provedor,
                        $request->nombre_producto,
                        $request->correo,
                        $request->telefono,
                        $request->id

                ]);

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
            return back()->with("correcto","Producto fue mofificado exitosamente");
        }else{
            return back()->with("incorrecto","Error al modificar");
        }

    }

    public function update_table(Request $request){

        try{
            $sql=DB::update(" update tables set name=?, ubicacion=? where id=? ",[
               
                $request->name,
                $request->ubicacion,
                $request->id

                ]);

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
            return back()->with("correcto","Empleado fue mofificado exitosamente");
        }else{
            return back()->with("incorrecto","Error al modificar");
        }

    }


    public function delete($id){

        try{
            $sql=DB::delete("delete from  employees where id=$id");
             

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
        return back()->with("correcto","Empleado fue eliminado exitosamente");
            }else{
        return back()->with("incorrecto","Error al eliminar ");
            
            }
        }

   
    public function delete_menu($id){

        try{
            $sql=DB::delete("delete from  products where id=$id");
             

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
        return back()->with("correcto","Producto fue eliminado exitosamente");
            }else{
        return back()->with("incorrecto","Error al eliminar ");
            
            }
    }

    public function delete_inv($id){

        try{
            $sql=DB::delete("delete from  inventories where id=$id");
             

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
        return back()->with("correcto","Producto fue eliminado exitosamente");
            }else{
        return back()->with("incorrecto","Error al eliminar ");
            
            }
    }

    public function delete_sup($id){

        try{
            $sql=DB::delete("delete from  suppliers where id=$id");
             

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
        return back()->with("correcto","eliminado exitosamente");
            }else{
        return back()->with("incorrecto","Error al eliminar ");
            
            }
    }

    public function delete_order($id){

        try{
            $sql=DB::delete("delete from  orders where id=$id");
             

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
        return back()->with("correcto","Empleado fue eliminado exitosamente");
            }else{
        return back()->with("incorrecto","Error al eliminar ");
            
            }
        }
        public function delete_table($id){

            try{
                $sql=DB::delete("delete from  tables where id=$id");
                 
    
            }catch(\Throwable $th){
    
                $sql =0;
    
            }
      
            if($sql == true){
            return back()->with("correcto","Empleado fue eliminado exitosamente");
                }else{
            return back()->with("incorrecto","Error al eliminar ");
                
                }
            }


            public function delete_admin($id){

                try{
                    $sql=DB::delete("DELETE from  users where id=$id");
                     
        
                }catch(\Throwable $th){
        
                    $sql =0;
        
                }
          
                if($sql == true){
                return back()->with("correcto","Empleado fue eliminado exitosamente");
                    }else{
                return back()->with("incorrecto","Error al eliminar ");
                    
                    }
              
              
                }

                public function index()

                {
                    return view('administrador.home');
                }
            }


   

//     // crud para empleados
   
//     public function inventories(){
//         return view ('administrador.inventarios');
//     }
//     public function subscriber(){
//         return view ('administrador.suscriptores');
//     }
//     public function food_menu(){
//         return view ('administrador.menu_de_comidas');
//     }

//     public function orders(){
//         return view ('administrador.pedidos');
//     }

//     public function suppliers(){
//         return view ('administrador.provedor');
//     }
//     public function sale(){

//         return view ('administrador.ventas');

//     }

//     public function admin(){

//         return view('administrador.admin');
//     }
// 
