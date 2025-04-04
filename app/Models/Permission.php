<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'model',
    ];



    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
