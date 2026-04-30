<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
      protected $table = 'roles';
    protected $fillable = [
        'name',
        'description',
    ];

    // RELACIONES

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'permiso_rol',      // 👈 tu tabla real
            'rol_id',          // FK en esa tabla
            'permiso_id'     // FK relacionada
        );
    }
}
