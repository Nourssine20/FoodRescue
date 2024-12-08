<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        'partenaire_id',
        'type_soutien',
        'montant',
        'date_debut',
        'date_fin',
    ];

    // Relation Inverse Many-to-One avec Partenaire
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }
}
