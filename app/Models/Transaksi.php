<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "transaksi";

    protected $guarded = [];

    function keranjang(){
        return $this->belongsTo(Keranjang::class,'id_keranjang')->withTrashed();
    }
    
}
