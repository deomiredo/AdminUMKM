<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = "produk";

    protected $guarded = [];

    function penjual() {
        return $this->belongsTo(Penjual::class,'id_penjual');
    }
    function kategori() {
        return $this->belongsTo(KategoriProduk::class,'id_kategori_produk');
    }
}
