<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'slug',
        'description',
        'goal',
        'duration',
        'level',
        'status'
    ];


}
