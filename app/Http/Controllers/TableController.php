<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
class TableController extends Controller
{
    public function index(){
        $mesas=Table::all();
        return view('mesa.index');//cateroria tabla 
        }
    
        public function store(Request $request)
        {
            $mesas=new Table;
            $mesas->name=$request->input('name');
            $mesas->ubicacion=$request->input('ubicacion');
            $mesas->save();
            return redirect()->back();
        }
    
        public function edit($id){
    
        }
    
        public function update(Request $request,$id){
    
            $mesas=Table::find($id);
            $mesas->name=$request->input('name');
            $mesas->ubicacion=$request->input('ubicacion');
            $mesas->update();
            return redirect()->back();
    
        }
    
        public function destroy($id)
        {
    
            $mesas=Table::find($id);
            $mesas->delete();
            return redirect()->back();
    
        }
    
    
}
