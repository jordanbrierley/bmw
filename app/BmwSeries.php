<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BmwSeries extends Model
{
	public $timestamps = true;

	public function models()
    {
        return $this->hasMany('App\BmwModel');
    }
   
}
