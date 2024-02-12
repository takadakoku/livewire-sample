<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AthleteInfo extends Model
{
    use HasFactory;
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;
    protected $table = 'athletes_info';
    protected $primaryKey = 'athlete_id';
    protected $fillable = [
        'athlete_id',
        'username',
        'bio',
        'profile_icon',
    ];

}
