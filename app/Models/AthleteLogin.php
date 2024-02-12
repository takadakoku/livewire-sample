<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AthleteLogin extends Model
{
    use HasFactory;
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;
    protected $table = 'athletes_login';
    protected $primaryKey = 'athlete_id';
    protected $fillable = [
        'athlete_id',
        'password',
        'email',
        'created_at',
    ];

    public static function auth($credentials)
    {
        $where = [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ];
        return AthleteLogin::where($where)->select('athlete_id')->first();
    }
}


