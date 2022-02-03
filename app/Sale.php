<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function sales(){
        return $this->hasMany('App\Detail');
    }
}
