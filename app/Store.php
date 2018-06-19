<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function client()
    {
        return $this->belongsTo('App\Client', 'clients_id', 'id');
    }
    //isamu
    public function manager()
    {
        return $this->belongsTo("App\Manager", 'managers_id', 'id');
    }

    public function routePoints()
    {
        return $this->hasMany('App\RoutePoint', 'stores_id', 'id');
    }
}
