<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'id_product', 'id_distributor', 'qty', 'harga_order', 'status_order','id_user','nomor_order'
    ];
}
