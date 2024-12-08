<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = ['type_produit', 'quantite', 'frequence_besoin', 'statut', 'benificaire_id'];

    public function benificaire()
    {
        return $this->belongsTo(Benificaire::class);
    }
}
