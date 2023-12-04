<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = "tb_pesanan";
    protected $guarded = ["id"];

    // public function produk() : BelongsTo
    // {
    //     return $this->belongsTo(produk::class);
    // }
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function detailPesanan() : HasMany
    {
        return $this->hasMany(Detailpesanan::class);
    }
}
