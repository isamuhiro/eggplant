<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // protected $guard = 'clients';

    protected $hidden = [
        'remember_token',
    ];

    public function products()
    {
        return $this->hasMany("App\ProductClient");
    }

    public function managers()
    {
        return $this->hasMany("App\Manager", "clients_id", "id");
    }

    public function stores()
    {
        return $this->hasMany("App\Store", "clients_id", "id");
    }

    public function oss(){
        return $this->hasMany('App\Os', 'clients_id', 'id')->orderBy('id','desc');
    }

}
