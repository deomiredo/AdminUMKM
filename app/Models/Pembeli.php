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
        return $this->hasMany(Keranjang::class,'id_pembeli');
    }
}
