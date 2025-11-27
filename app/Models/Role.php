<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'user_id',
        'role_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
