<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;
    protected $table = 'posts';
    protected $primaryKey = 'athlete_id';
    protected $fillable = [
        'post_id',
        'athlete_id',
        'content',
        'image1',
        'image2',
        'image3',
        'image',
        'created_at',
    ];

    public static function auth($credentials)
    {
    }
}
