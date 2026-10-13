<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamats';

    protected $primaryKey = 'alamat_id';

    protected $fillable = ['user_id', 'label', 'alamat_lengkap', 'kota', 'provinsi', 'kode_pos'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
