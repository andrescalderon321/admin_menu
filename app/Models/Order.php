<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function table(){
        return $this->belongsTo('App\Models\Table');
    }

    public function detail(){

        return $this->belongsTo('App\Models\Detail');

    }

}
