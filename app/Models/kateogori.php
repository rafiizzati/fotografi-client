<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $primaryKey = 'kategori_id';

    protected $fillable = ['nama_kategori', 'icon', 'tipe'];

    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}
