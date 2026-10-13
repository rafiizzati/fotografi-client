<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rekening extends Model
{
    use HasFactory;

    protected $table = 'rekenings';

    protected $primaryKey = 'rekening_id';

    protected $fillable = ['mitra_id', 'nama_bank', 'nomor_rekening', 'nama_pemilik'];

    protected function casts(): array
    {
        return [
            'nomor_rekening' => 'encrypted',
        ];
    }

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    public function penarikanSaldos(): HasMany
    {
        return $this->hasMany(PenarikanSaldo::class, 'rekening_id');
    }
}
