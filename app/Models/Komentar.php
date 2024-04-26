<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Komentar extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'komentar';
    protected $guarded = [];



    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli');
    }

    function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
