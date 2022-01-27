<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
class Distributor extends Model
{
    //
    // use SoftDeletes;
    protected $primaryKey = 'id_distributor';
    protected $fillable = [
        'nama_distributor', 'alamat_distributor', 'no_hp_distributor'
    ];

    protected $hidden = [

    ];
}
