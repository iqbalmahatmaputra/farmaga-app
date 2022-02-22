<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    protected $primaryKey = 'id_product_stock';
    protected $fillable = [
        'qty_stock', 'id_product','id_distributor','nomor_order_stock','status','harga'
    ];

    protected $hidden = [

    ];
}
