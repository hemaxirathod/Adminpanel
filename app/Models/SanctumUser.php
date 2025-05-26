<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\SanctumServiceProvider;

class SanctumUser extends Model
{
    use HasFactory, Notifiable , HasApiTokens;

    public $table="sanctumuser";
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

}
