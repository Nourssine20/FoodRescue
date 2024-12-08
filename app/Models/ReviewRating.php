<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    use HasFactory;
    protected $fillable = [
        'offre_id',
        'comments',
        'star_rating',
        'status',
        'user_id'
    ];

    
    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}
