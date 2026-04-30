<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Permission extends Model
{
      protected $table = 'permisos';
    protected $fillable = [
        'name',
        'description',
    ];

    // RELACIONES

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_permissions');
    }

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'permiso_rol',
            'permiso_id',
            'rol_id'
        );
    }
}
