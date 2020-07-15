<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{

    public  function  categoryCount(){

        return  $this->hasMany('App\Models\Articles','category_id','id')->count();
                              //Bağlanacağımız Tablo , Bağlanacağımız sütun , Kendi tablomuz üzerinden bağlandığımız sütun
                              //Articles tablosunda bizim id mizden kaç tane var sayısını getir.
    }


}
