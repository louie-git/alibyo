<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    protected $table = 'expenditures';
    public $primaryKey = 'exp_id';
    public $timestamps = false;
    function exp_items(){
        return $this->hasMany('App\Bought_item','exp_id','exp_id');
    }
}
