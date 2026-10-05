<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaketDetail extends Model
{
    use HasFactory;

    protected $table = 'paket_details';

    protected $primaryKey = 'paket_detail_id';

    protected $fillable = ['paket_id', 'produk_id', 'jumlah'];

    public function paket(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'paket_id');
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
