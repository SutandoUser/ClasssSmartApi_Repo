<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = [
        'owner',
        'name',
        'description',
        'active'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_groups', 'group_id', 'student_id');
    }
}
