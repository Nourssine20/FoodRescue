<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = ['date_livraison', 'statut', 'collecte_id'];

    // Relation avec Collecte (Une livraison appartient à une collecte)
    public function collecte()
    {
        return $this->belongsTo(Collecte::class);
    }
}
