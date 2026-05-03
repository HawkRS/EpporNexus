<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Constants\UserRoles;
use App\Models\Role;
use App\Models\Permission;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'last',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // RELACIONES
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'permiso_usuario',  // 👈 tu tabla real
            'user_id',
            'permiso_id'
        );
    }

    public function comisiones()
    {
        return $this->hasMany(\App\Models\Comision::class);
    }

    // ROLES
    public function hasRole($roleName): bool
    {
        return optional($this->role)->name === $roleName;
    }

    public function isDirector(): bool
    {
        return $this->hasRole(UserRoles::DIRECTOR);
    }

    public function isGerente(): bool
    {
        return $this->hasRole(UserRoles::GERENTE);
    }

    public function isVendedor(): bool
    {
        return $this->hasRole(UserRoles::VENDEDOR);
    }

    // PERMISOS

    public function hasPermission($permission): bool
{
    // 🔥 Director (si lo usas después)
    if ($this->isDirector()) {
        return true;
    }

    // (Gerente con acceso total)
    if ($this->isGerente() && $this->email === 'ing.carlosglezhdez@hotmail.com') {
        return true;
    }

    // 🚫 EXCEPCIONES
    if ($this->email === 'dagh0022@gmail.com') {
        if (in_array($permission, ['gestionar_usuarios', 'ver_comisiones', 'gestionar_comisiones'])) {
            return false;
        }
    }

    // Permisos directos
    if ($this->permissions()
        ->where('clave', $permission)
        ->exists()) {
        return true;
    }

    // Permisos por rol
    return $this->role?->permissions()
        ->where('clave', $permission)
        ->exists();
}
}
