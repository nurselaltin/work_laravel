<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
    use SoftDeletes;
    public  function  getCategory(){

        //tabloları ilişkilendirdik
        //Kategoriye ait bilgileri getirdik.
        return $this->hasOne('App\Models\Category','id','category_id');

    }
}
