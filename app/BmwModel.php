<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BmwModel extends Model
{
    public $timestamps = true;

    public function series()
    {
        return $this->belongsTo('App\BmwSeries');
    }

    
}
