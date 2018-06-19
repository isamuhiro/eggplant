<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client', 'clients_id', 'id');
    }

    public function product()
    {
        return $this->hasMany('App\Product', 'id', 'products_id');
    }

    public function os()
    {
        return $this->belongsTo('App\Os');
    }
}
