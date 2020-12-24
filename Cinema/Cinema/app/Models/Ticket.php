<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'schedule_id',
        'user_id',
         'place', 
         'type',
        
          
    ];
    
     public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
     public function schedule()
    {
        return $this->belongsTo('App\Models\Schedule','schedule_id');
    }
    use HasFactory;
}
