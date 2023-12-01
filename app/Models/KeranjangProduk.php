<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangProduk extends Model
{
    use HasFactory;

    protected $table= 'keranjang_produk';

    protected $guarded = [];

    function produk() {
        return $this->belongsTo(Produk::class,'id_produk');
    }

    function keranjang() {
        return $this->belongsTo(Keranjang::class,'id_keranjang');
    }
}
