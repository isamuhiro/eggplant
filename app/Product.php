<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'photo',
        'price',
        'weight',
        'amount'
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    protected $dates = ['deleted_at'];
}
