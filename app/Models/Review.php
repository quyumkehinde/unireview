<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'description',
        'degree',
        'course',
        'graduation_year',
        'rating',
        'moderation_status'
    ];
}
