<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Doctor extends Model
{
    use HasFactory;
    use Notifiable;
    protected $connection = 'mysql'; 
    protected $fillable = [
        'email'
    ];
   // public $timestamps = true;

}
