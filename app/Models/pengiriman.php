<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'tb_pengiriman';

    protected $guarded = ['id'];

    public function pesanan() : BelongsTo
    {
        return $this->belongsTo(Pesanan::class);
    }
}
