<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{ 
    protected $fillable = [
        'movie_id',
        'day_id',
         'hall_number', 
         'time',
         'price_ch',
        'price_st',
        'price_ad',
         'finished',
         'places',
          
    ];
    
     public function day()
    {
        return $this->belongsTo('App\Models\Day','day_id');
    }
    
     public function movie()
    {
        return $this->belongsTo('App\Models\Movie','movie_id');
    }
    use HasFactory;
}
