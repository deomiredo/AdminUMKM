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
<<<<<<< HEAD
        return $this->belongsToMany(Produk::class, 'keranjang_produk','id_keranjang','id_produk')->withPivot('id','jumlah');
=======
        return $this->belongsToMany(Produk::class, 'keranjang_produk','id_keranjang','id_produk')->withPivot('jumlah','id');
    }
    public function produkWithTrash()
    {
        return $this->belongsToMany(Produk::class, 'keranjang_produk','id_keranjang','id_produk')->withPivot('jumlah','id')->withTrashed();
>>>>>>> f6b45d599e3c4efa05cefa0496566a93a3a739c6
    }
}
