<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model

{
    protected $fillable = [
        'text',
        'day',
        'finished', 
    ];

 public function movies()
    {
    
    return $this->belongsToMany('App\Models\Movie', 'schedules', 'day_id', 'movie_id');
        
    }




    use HasFactory;
}
