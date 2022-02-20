<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
       // use SoftDeletes;
       protected $primaryKey = 'id_cabang';
       protected $table = 'cabang';
       protected $fillable = [
           'nama_cabang', 'lokasi', 'limit_perhari','limit_perbulan'
       ];
   
       protected $hidden = [
   
       ];
}
