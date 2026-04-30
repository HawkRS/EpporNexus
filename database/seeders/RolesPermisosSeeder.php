<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesPermisosSeeder extends Seeder
{
    public function run(): void
    {
        // 🔹 1. Roles
        $roles = [
            ['id' => 1, 'nombre' => 'Director'],
            ['id' => 2, 'nombre' => 'Gerente'],
            ['id' => 3, 'nombre' => 'Vendedor'],
        ];

        DB::table('roles')->insert($roles);

        // 🔹 2. Permisos
        $permisos = [
            // Ventas
            ['clave' => 'ver_pedidos', 'descripcion' => 'Ver pedidos propios'],
            ['clave' => 'crear_pedidos', 'descripcion' => 'Crear pedidos'],
            ['clave' => 'editar_pedidos', 'descripcion' => 'Editar pedidos'],
            ['clave' => 'ver_todos_pedidos', 'descripcion' => 'Ver todos los pedidos'],

            // Clientes
            ['clave' => 'ver_clientes', 'descripcion' => 'Ver clientes'],
            ['clave' => 'crear_clientes', 'descripcion' => 'Crear clientes'],

            // Finanzas
            ['clave' => 'ver_finanzas', 'descripcion' => 'Ver finanzas'],
            ['clave' => 'ver_comisiones', 'descripcion' => 'Ver comisiones'],

            // Administración
            ['clave' => 'gestionar_usuarios', 'descripcion' => 'Administrar usuarios'],
            ['clave' => 'asignar_permisos', 'descripcion' => 'Asignar permisos'],
        ];

        DB::table('permisos')->insert($permisos);

        // 🔹 Obtener IDs reales
        $permisosDB = DB::table('permisos')->get()->keyBy('clave');

        // 🔹 3. Asignar permisos a roles

        $relaciones = [];

        // Director → TODO
        foreach ($permisosDB as $permiso) {
            $relaciones[] = [
                'rol_id' => 1,
                'permiso_id' => $permiso->id,
            ];
        }

        // Gerente → casi todo menos admin total
        $gerentePermisos = [
            'ver_pedidos',
            'crear_pedidos',
            'editar_pedidos',
            'ver_todos_pedidos',
            'ver_clientes',
            'crear_clientes',
            'ver_finanzas',
            'ver_comisiones',
        ];

        foreach ($gerentePermisos as $clave) {
            $relaciones[] = [
                'rol_id' => 2,
                'permiso_id' => $permisosDB[$clave]->id,
            ];
        }

        // Vendedor → limitado
        $vendedorPermisos = [
            'ver_pedidos',
            'crear_pedidos',
            'editar_pedidos',
            'ver_clientes',
            'crear_clientes',
        ];

        foreach ($vendedorPermisos as $clave) {
            $relaciones[] = [
                'rol_id' => 3,
                'permiso_id' => $permisosDB[$clave]->id,
            ];
        }

        DB::table('permiso_rol')->insert($relaciones);
    }
}
