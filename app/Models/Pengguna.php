<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Pengguna extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "pengguna";
    protected $hidden = [        
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Pengguna $pengguna){
            $pengguna->password = Hash::make($pengguna -> password);
        });
        static::updating(function(Pengguna $pengguna){
            // cek apakah password udah berbeda dengan yg ada di database
            if($pengguna->isDirty(["password"])){
                $pengguna->password = Hash::make($pengguna->password);
            }
        });
    }
}
