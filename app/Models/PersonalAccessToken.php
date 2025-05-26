<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    public $table="personal_access_tokens";
    public $timestamps = false;
}
