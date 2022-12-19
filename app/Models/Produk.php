<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    public $guarded = ['id'];
    protected $table = 'produk';
    protected $hidden = [        
        'created_at',
        'updated_at'
    ];
}
