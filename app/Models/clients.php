<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'age',
        'weight',
        'height',
        'activity_level',
        'goal',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }


}
