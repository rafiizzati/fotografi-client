<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $primaryKey = 'pesanan_id';

    protected $fillable = ['user_id', 'mitra_id', 'jadwal_id', 'tanggal_pesanan', 'tanggal_sewa', 'jam_sewa', 'total_harga', 'biaya_admin', 'status_pesanan', 'catatan', 'metode_pengambilan'];

    protected function casts(): array
    {
        return [
            'tanggal_pesanan' => 'date',
            'tanggal_sewa' => 'date',
            'total_harga' => 'integer',
            'biaya_admin' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(JadwalProduk::class, 'jadwal_id');
    }

    public function detailPesanans(): HasMany
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }

    public function pembayaran(): HasOne
    {
        return $this->hasOne(Pembayaran::class, 'pesanan_id');
    }

    public function ulasans(): HasMany
    {
        return $this->hasMany(Ulasan::class, 'pesanan_id');
    }
}
