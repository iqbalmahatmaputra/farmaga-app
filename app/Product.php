<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'nama_product', 'satuan_product'
    ];

    protected $hidden = [

    ];
}
