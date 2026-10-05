<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JadwalProduk extends Model
{
    use HasFactory;

    protected $table = 'jadwal_produks';

    protected $primaryKey = 'jadwal_id';

    protected $fillable = ['produk_id', 'tanggal', 'jam_mulai', 'jam_selesai', 'status'];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function pesanans(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'jadwal_id');
    }
}
