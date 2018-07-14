<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    public function getRouteKeyName(){
        return 'name';
    }
    public function posts(){
        return $this->hasMany('\App\Post');
    }
    public function popularPosts(){
        return $this->hasMany('\App\Post')->orderBy('count','desc');
    }
}
