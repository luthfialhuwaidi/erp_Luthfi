<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'kode_barang',
    'nama_barang',
    'kategori',
    'satuan',
    'stok',
    'stok_minimum',
    'harga',
    'status',
])]
class Barang extends Model
{
    public function mutasiStoks(): HasMany
    {
        return $this->hasMany(MutasiStok::class); 
    }
}
