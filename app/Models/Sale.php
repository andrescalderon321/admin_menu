<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table='sales';
    protected $primarykey='id';
    protected $fillable=['order_id','num_venta'];
    public $timestamps=false;

    public function Pedido(){
        return $this->hasOne(Order::class,'id','order_id');
        // return $this->belongsTo(Order::class,'id','order_id');
      
    }
}
//     public function detalle_orden (){

//         return $this->belongsTo('App\Models\Detail');

//     }
// }
