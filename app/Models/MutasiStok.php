<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'barang_id',
    'tipe',
    'jumlah',
    'keterangan',
    'tanggal',
])]
class MutasiStok extends Model
{
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
