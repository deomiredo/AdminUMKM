<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembeli extends Model
{
    use HasFactory,SoftDeletes;
    protected $table= 'pembeli';
    
    protected $guarded = [];

    function keranjang (){
        return $this->hasOne(Keranjang::class,'id_pembeli');
    }
    public function transaksi()
    {
        return $this->hasManyThrough(Transaksi::class, Keranjang::class,'id_pembeli','id_keranjang');
    }

    public function jumlahTransaksiByStatus($status)
    {
        return $this->transaksi()->where('status', $status)->count();
    }
}
