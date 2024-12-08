<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',           
        'description',      
        'type',             // Type of offer (e.g., "Food", "Clothes", "Shelter")
        
        'available_from',  
        'available_until', 
        'image',
        
        'donator_id',       // Foreign key linking to the Donator model
    ];
    public function donator()
    {
        return $this->belongsTo(Donator::class);
    }
    public function reviews()
    {
        return $this->hasMany(ReviewRating::class, 'offre_id'); // Specify the foreign key if needed
    }
}
