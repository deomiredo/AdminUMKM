<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjual extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'penjual';

    protected $guarded = [];

    function produks() {
        return $this->hasMany(Produk::class,'id_kategori_produk');  
    }
}
