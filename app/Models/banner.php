<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $primaryKey = 'banner_id';

    protected $fillable = ['judul', 'deskripsi', 'gambar', 'link_tujuan', 'urutan', 'is_active', 'tanggal_mulai', 'tanggal_selesai'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
        ];
    }
}
