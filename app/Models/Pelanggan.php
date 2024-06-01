<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'namapelanggan',
        'alamat',
        'telepon',
        'bayar'
    ];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
