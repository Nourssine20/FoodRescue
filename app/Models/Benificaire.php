<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benificaire extends Model
{
    use HasFactory;

    protected $table = 'benificaires';

    protected $fillable = [
        'nom',
        'adresse',
        'tel',
        'email',
        'type',
    ];
    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
}
