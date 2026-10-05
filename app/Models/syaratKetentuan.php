<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SyaratKetentuan extends Model
{
    use HasFactory;

    protected $table = 'syarat_ketentuans';

    protected $primaryKey = 'sk_id';

    protected $fillable = ['produk_id', 'mitra_id', 'isi_syarat', 'urutan'];

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }
}
