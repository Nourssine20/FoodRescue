<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donator extends Model
{
    use HasFactory;

    protected $table = 'donators';

    
    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'email',
        'type',
    ];
    public function Offre()
    {
        return $this->hasMany(Offre::class);
    }
}
