<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Order;

use Hamcrest\Number\OrderingComparison;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function index(){

        $ordenes=Order::all();
        $mesas=Table::all();
        return view('orden.index',compact('mesas','ordenes'));
        }

    public function store(Request $request){
        $ordenes=new Order;
        $ordenes->table_id=$request->input('table_id');
        $ordenes->estado=$request->input('estado');
        $ordenes->total=$request->input('total');
        $ordenes->fecha_de_pedido=$request->input('fecha_de_pedido');
     
        $ordenes->save();
        return redirect()->back();


    }

    public function edit($id){

    }


    public function update(Request $request, $id){

        $ordenes= Order::find($id);
        $ordenes->table_id=$request->input('table_id');
        $ordenes->estado=$request->input('estado');
        $ordenes->fecha_de_pedido=$request->input('fecha_de_pedido');
        $ordenes->total->$request->input('total');
        $ordenes->update();
        return redirect()->back();

    }

    public function destroy($id){

        $ordenes= Order::find($id);
        $ordenes->delete();
        return redirect()->back();

    }
}
