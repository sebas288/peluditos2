<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'category_id', 'name', 'price', 'descripcion', 'imagen', 'cantidad', 'referencia', 'medida',
    ];

    public function category(){
        return $this->hasMany('App\Categoria');
    }
    
}
