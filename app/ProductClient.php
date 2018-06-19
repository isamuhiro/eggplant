<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductClient extends Model
{
	protected $table = 'products_clients';

	public function clients(){
   		return $this->hasMany("App\Client");
   	}
}
