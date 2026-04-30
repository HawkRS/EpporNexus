<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission; // Asegúrate de que el modelo se llame así

class AsignarRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. CREAR LOS ROLES (Usando la columna 'nombre' según tu BD)
        // Eliminamos 'description' porque no existe en tu tabla de roles
        $rolGerente = Role::firstOrCreate(
            ['nombre' => 'Gerente']
        );

        $rolSubgerente = Role::firstOrCreate(
            ['nombre' => 'Subgerente']
        );

        $rolVendedor = Role::firstOrCreate(
            ['nombre' => 'Vendedor']
        );

        // 2. CREAR LOS PERMISOS (Usando 'clave' y 'descripcion' según tu BD)
        $permisos = [
            ['clave' => 'gestionar_usuarios', 'descripcion' => 'Crear, editar y eliminar usuarios'],
            ['clave' => 'ver_pedidos', 'descripcion' => 'Ver la lista de pedidos'],
            ['clave' => 'crear_pedidos', 'descripcion' => 'Crear nuevos pedidos'],
            ['clave' => 'editar_pedidos', 'descripcion' => 'Editar pedidos existentes'],
            ['clave' => 'eliminar_pedidos', 'descripcion' => 'Eliminar o cancelar pedidos'],
            ['clave' => 'ver_finanzas', 'descripcion' => 'Ver ingresos y egresos'],
            // Agrega aquí todos los permisos que necesite tu plataforma...
        ];

        foreach ($permisos as $permisoData) {
            Permission::firstOrCreate(
                ['clave' => $permisoData['clave']],
                ['descripcion' => $permisoData['descripcion']]
            );
        }

        // 3. ASIGNAR PERMISOS USANDO ELOQUENT
        // A) Subgerente (Todos excepto 'gestionar_usuarios')
        $permisosParaSubgerente = Permission::where('clave', '!=', 'gestionar_usuarios')->pluck('id');
        // El método sync() limpia los permisos anteriores de este rol y asigna solo los nuevos.
        // Utiliza la relación permissions() que definiste en tu modelo Role.
        $rolSubgerente->permissions()->sync($permisosParaSubgerente);

        // B) Vendedor normal (Solo ver y crear pedidos)
        $permisosBasicos = Permission::whereIn('clave', ['ver_pedidos', 'crear_pedidos'])->pluck('id');
        $rolVendedor->permissions()->sync($permisosBasicos);


        // 4. ASIGNAR ROLES A LOS USUARIOS EXISTENTES
        // A) Asignarte a ti como Gerente (Cambia el correo por el tuyo)
        User::where('email', 'ing.carlosglezhdez@hotmail.com')->update(['rol_id' => $rolGerente->id]);

        // B) Asignar al vendedor específico como Subgerente (Cambia el correo)
        User::where('email', 'dagh0022@gmail.com')->update(['rol_id' => $rolSubgerente->id]);

        // C) Asignar a TODOS los demás que no tengan rol, como Vendedor Normal
        User::whereNull('rol_id')->update(['rol_id' => $rolVendedor->id]);

        $this->command->info('Roles, permisos y usuarios actualizados correctamente con Eloquent.');
    }
}
