<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Os extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public function orders()
    {
        return $this->hasMany("App\Order");
    }

    public function manager()
    {
      return $this->belongsTo("App\Manager","managers_id","id");
    }

    public function store()
    {
      return $this->belongsTo("App\Store","stores_id","id");
    }

    public function driver(){
      return $this->belongsTo("App\Drivers","drivers_id","id");
    }
}
