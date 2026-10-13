<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasans';

    protected $primaryKey = 'ulasan_id';

    protected $fillable = ['pesanan_id', 'user_id', 'produk_id', 'rating', 'komentar', 'foto_ulasan', 'tanggal_ulasan'];

    protected function casts(): array
    {
        return [
            'tanggal_ulasan' => 'date',
            'rating' => 'integer',
        ];
    }

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
