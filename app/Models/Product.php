<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function detail (){

        return $this->belongsToMany('App\Models\Detail');

    }

    public function adicion (){

        return $this->belongsToMany('App\Models\Adicion');

    }
}
