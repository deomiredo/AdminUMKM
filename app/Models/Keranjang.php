<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keranjang extends Model
{
    use HasFactory,SoftDeletes;
    protected $table= 'keranjang';

    protected $guarded = [];

    function transaksis() {
        return $this->hasOne(Transaksi::class,'id_keranjang');
    }

    function produk() {
        return $this->belongsTo(Produk::class,'id_produk');
    }
}
