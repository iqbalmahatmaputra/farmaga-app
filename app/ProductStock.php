<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    protected $primaryKey = 'id_product_stock';
    protected $fillable = [
        'qty_stock', 'id_product','id_distributor'
    ];

    protected $hidden = [

    ];
}
