<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ktvreport extends Model
{
    public function ktvroom(){
        return $this->belongsTo('App\Ktvroom');
    }
}
