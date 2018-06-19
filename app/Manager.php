<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

use Illuminate\Notifications\Notifiable;

class Manager extends Authenticatable
{
  use Notifiable, HasApiTokens;

  protected $guard = 'managers';

  public function store()
  {
    return $this->hasOne('App\Store', 'managers_id', 'id');
  }

  public function client()
  {
    return $this->belongsTo("App\Client", "clients_id", "id");
  }

  public function oss()
  {
    return $this->hasMany('App\Os', 'managers_id', 'id')->orderBy('id', 'desc');
  }
}
