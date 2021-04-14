<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bought_item extends Model
{
    protected $table = 'bought_items';
    public $primaryKey = 'item_id';
    public $timestamps = false;
}
