<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'Crear Contenido',
        ]);

        Permission::create([
            'name' => 'Leer Contenido',
        ]);

        Permission::create([
            'name' => 'Actualizar Contenido',
        ]);

        Permission::create([
            'name' => 'Eliminar Contenido',
        ]);

        Permission::create([
            'name' => 'Publicar Contenido',
        ]);

        Permission::create([
            'name' => 'Ver Dashboard',
        ]);

        Permission::create([
            'name' => 'Crear Role',
        ]);

        Permission::create([
            'name' => 'Listar Role',
        ]);

        Permission::create([
            'name' => 'Editar Role',
        ]);

        Permission::create([
            'name' => 'Eliminar Role',
        ]);

        Permission::create([
            'name' => 'Listar Usuarios',
        ]);

        Permission::create([
            'name' => 'Validar Postulantes',
        ]);
    }
}
