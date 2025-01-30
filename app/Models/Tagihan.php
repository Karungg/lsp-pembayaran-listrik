<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihan';

    protected $fillable = [
        'tbpelanggan_id',
        'tahun_tagihan',
        'bulan_tagihan',
        'pemakaian'
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'tbpelanggan_id', 'id');
    }
}
