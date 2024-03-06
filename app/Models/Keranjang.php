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

    function transaksi() {
        return $this->hasOne(Transaksi::class,'id_keranjang');
    }

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class,'id_pembeli');
    }

    public function produk()
    {

        return $this->belongsToMany(Produk::class, 'keranjang_produk','id_keranjang','id_produk')->withPivot('id','jumlah');
// >>>>>>> Stashed changes
    }
    public function produkWithTrash()
    {
        return $this->belongsToMany(Produk::class, 'keranjang_produk','id_keranjang','id_produk')->withPivot('jumlah','id')->withTrashed();
    }
}
