<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'type',
        'contact',
        'secteur_activite',
    ];

    // Relation One-to-Many avec Sponsorship
    public function sponsorships()
    {
        return $this->hasMany(Sponsorship::class);
    }
}
