<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Isikeranjang extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "isi_keranjang";
    
    protected $guarded = [];
}
