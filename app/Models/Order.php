<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $primarykey='id';
    protected $fillable=['table_id','estado','fecha_de_pedido','total'];
    public $timestamps=false;

    public function Mesa(){
        return $this->hasOne(Table::class,'id','table_id');
    }

    public function detail(){

        return $this->belongsTo('App\Models\Detail');

    }

}
