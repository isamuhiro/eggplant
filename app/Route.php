<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Route extends Model
{
  public function routePoints(){
      return $this->hasMany('App\RoutePoint','routes_id','id');
  }
  public function driver(){
      return $this->belongsTo('App\Drivers','drivers_id','id');
  }
}
