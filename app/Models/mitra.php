<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mitra extends Model
{
    use HasFactory;

    protected $primaryKey = 'mitra_id';

    protected $fillable = ['nama_mitra', 'deskripsi', 'alamat', 'logo', 'banner', 'rating', 'total_ulasan', 'jam_operasional'];

    protected function casts(): array
    {
        return [
            'rating' => 'decimal:2',
        ];
    }

    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class, 'mitra_id');
    }

    public function rekenings(): HasMany
    {
        return $this->hasMany(Rekening::class, 'mitra_id');
    }

    public function portofolios(): HasMany
    {
        return $this->hasMany(Portofolio::class, 'mitra_id');
    }

    public function pesanans(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'mitra_id');
    }

    public function penarikanSaldos(): HasMany
    {
        return $this->hasMany(PenarikanSaldo::class, 'mitra_id');
    }

    public function syaratKetentuans(): HasMany
    {
        return $this->hasMany(SyaratKetentuan::class, 'mitra_id');
    }
}
