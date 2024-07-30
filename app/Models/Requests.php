<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'house_id',
        'name',
        'first_name',
        'birth_year',
        'address',
        'profession_at_port',
        'service_status',
        'dg_status',
        'initial_status',
        'motif',
        'letter',
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

    // Définir les valeurs par défaut pour les statuts
    public const STATUS_PENDING = 'en attente';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    public const SERVICE_STATUS_PENDING = 'en attente';
    public const SERVICE_STATUS_APPROVED = 'approved';
    public const SERVICE_STATUS_REJECTED = 'rejected';

    public const DG_STATUS_PENDING = 'en attente';
    public const DG_STATUS_APPROVED = 'approved';
    public const DG_STATUS_REJECTED = 'rejected';
}
