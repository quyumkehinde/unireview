<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'degree',
        'course',
        'graduation_year',
        'rating',
        'moderation_status'
    ];
}
