<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'tbpelanggan';

    protected $fillable = [
        'tbtariflistrik',
        'nama_pelanggan',
        'alamat'
    ];

    public function tarifListrik(): HasMany
    {
        return $this->hasMany(TarifListrik::class, 'tbuser_id', 'id');
    }

    public function tagihan(): HasMany
    {
        return $this->hasMany(Tagihan::class, 'tbpelanggan_id', 'id');
    }
}
