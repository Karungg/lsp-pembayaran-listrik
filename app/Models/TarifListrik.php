<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TarifListrik extends Model
{
    use HasFactory;

    protected $table = 'tb_tarif_listrik';

    protected $fillable = [
        'kdtarif',
        'beban',
        'tarif_perkwh',
        'tbuser_id'
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'tbuser_id', 'id');
    }
}
