<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
     protected $fillable = [
        'title',
        'is_premiere',
         'rating', 
         'trailer_url',
         'small_pic',
         'large_pic',
         'overview',
         'year' 
    ];
     
     public function days()
    {
    
    return $this->belongsToMany('App\Models\Day', 'schedules', 'movie_id', 'day_id');
        
    }
       public function schedules()
    {
    
    return $this->hasMany('App\Models\Schedule');
        
    }
    use HasFactory;
}
