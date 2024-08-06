<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table='tables';
    protected $primarykey='id';
    protected $fillable=['name','ubicacion'];
    public $timestamps=false;

    // public function order(){
    //     return $this->hasOne('App\Models\Order');
    // }
}