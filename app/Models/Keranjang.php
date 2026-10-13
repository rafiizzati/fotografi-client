<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjangs';

    protected $primaryKey = 'keranjang_id';

    protected $fillable = ['user_id', 'produk_id', 'jumlah', 'tanggal_sewa', 'jam_sewa', 'catatan'];

    protected function casts(): array
    {
        return [
            'tanggal_sewa' => 'date',
        ];
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
