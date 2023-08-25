<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory;
    public $guarded = ['id'];
    protected $table = 'produk';
    
    public function user():BelongsTo{
        return $this->belongsTo(Pengguna::class);
    }
}
