<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'details';

    public function sale(){
        return $this->belongsTo('App\Sale', 'sale_id');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

    protected $fillable = [
        'sale_id', 'product_id', 'quantity', 'price',
    ];
}
