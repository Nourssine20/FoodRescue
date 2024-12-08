<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',          
        'description',  
        'quantity',      
        'price',        
        'expiration_date', 
        'category_id',   
        'stock_status', 
        'image',
       
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
