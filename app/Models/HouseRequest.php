<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'house_id',
        'status',
        'name',
        'phone',
        'address',
        'profession',
        'marital_status',
    ];

    // Définir les relations avec les modèles User et House
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
