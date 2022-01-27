<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $primaryKey = 'id_product_price';
    protected $fillable = [
        'harga', 'id_product','id_distributor'
    ];

    protected $hidden = [

    ];
}
