<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
    protected $table = 'categorias';   

    public function products(){
        return $this->hasMany('App\Product', 'category_id');
    }

}
