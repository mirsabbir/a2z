<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    public function getRouteKeyName(){
        return 'slug';
    }
}
