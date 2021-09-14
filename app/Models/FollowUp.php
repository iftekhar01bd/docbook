<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['id', 'type', 'p_email', 'd_email', 'message', 'image', 'created_at', 'updated_at'];
}
