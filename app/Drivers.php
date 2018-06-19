<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drivers extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    protected $guard = 'drivers';
    protected $dates = ['deleted_at'];

    public function os()
    {
        return $this->hasMany("App\Os");
    }

    public function route()
    {
        return $this->hasMany("App\Route", "drivers_id", "id");
    }

}
