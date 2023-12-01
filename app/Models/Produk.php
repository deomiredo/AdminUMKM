<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "produk";

    protected $guarded = [];

    

    function penjual() {
        return $this->belongsTo(Penjual::class,'id_penjual');
    }
    function kategori() {
        return $this->belongsTo(KategoriProduk::class,'id_kategori_produk');
    }

    
}
