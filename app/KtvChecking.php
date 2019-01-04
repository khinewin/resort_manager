<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KtvChecking extends Model
{
    public function ktvroom(){
        return $this->belongsTo('App\Ktvroom');
    }
}
