<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    use HasFactory;

    protected $primaryKey = 'produk_id';

    protected $fillable = ['mitra_id', 'kategori_id', 'nama_produk', 'deskripsi', 'spesifikasi', 'harga', 'satuan_harga', 'stok', 'foto_produk', 'tipe_produk', 'is_paket'];

    protected function casts(): array
    {
        return [
            'is_paket' => 'boolean',
            'harga' => 'integer',
            'stok' => 'integer',
        ];
    }

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function fasilitas(): HasMany
    {
        return $this->hasMany(Fasilitas::class, 'produk_id');
    }

    public function jadwals(): HasMany
    {
        return $this->hasMany(JadwalProduk::class, 'produk_id');
    }

    public function syaratKetentuans(): HasMany
    {
        return $this->hasMany(SyaratKetentuan::class, 'produk_id');
    }

    public function detailPesanans(): HasMany
    {
        return $this->hasMany(DetailPesanan::class, 'produk_id');
    }

    public function ulasans(): HasMany
    {
        return $this->hasMany(Ulasan::class, 'produk_id');
    }

    public function produkDalamPaket(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'paket_details', 'paket_id', 'produk_id', 'produk_id', 'produk_id')
            ->withPivot('jumlah')
            ->withTimestamps();
    }
}
