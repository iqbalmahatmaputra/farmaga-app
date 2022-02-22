<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey = 'id_payment';
    protected $table = 'payments';
    protected $fillable = [
        'nomor_order_stock', 'jenis','total_harga','tanggal_pembayaran'
    ];

    protected $hidden = [

    ];
}
