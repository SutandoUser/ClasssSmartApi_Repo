<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    protected $fillable = [
        "user_id",
        "device_id",
        "ip_address",
        "login_at",
        "logout_at"
    ];
}
