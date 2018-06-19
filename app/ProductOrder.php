<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product','products_id','id');
    }

    protected $table = 'product_orders';
}
