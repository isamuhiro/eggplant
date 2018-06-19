<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoutePoint extends Model
{
  protected $table = 'routes_points';

  public function store()
  {
    return $this->belongsTo('App\Store', 'stores_id', 'id');
  }

  public function route()
  {
    return $this->belongsTo('App\Route', 'routes_id', 'id');
  }

  public function os()
  {
    return $this->belongsTo('App\Os', 'os_id', 'id');
  }
  
}
