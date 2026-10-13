<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenarikanSaldo extends Model
{
    use HasFactory;

    protected $table = 'penarikan_saldos';

    protected $primaryKey = 'penarikan_id';

    protected $fillable = ['mitra_id', 'rekening_id', 'jumlah', 'status', 'tanggal_penarikan'];

    protected function casts(): array
    {
        return [
            'tanggal_penarikan' => 'datetime',
        ];
    }

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    public function rekening(): BelongsTo
    {
        return $this->belongsTo(Rekening::class, 'rekening_id');
    }
}
