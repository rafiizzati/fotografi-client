<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';

    protected $primaryKey = 'pembayaran_id';

    protected $fillable = ['pesanan_id', 'metode_pembayaran', 'qr_code', 'qr_reference_id', 'qr_expired_at', 'jumlah_bayar', 'status_pembayaran', 'bukti_bayar', 'waktu_bayar'];

    protected function casts(): array
    {
        return [
            'qr_expired_at' => 'datetime',
            'waktu_bayar' => 'datetime',
        ];
    }

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }
}
