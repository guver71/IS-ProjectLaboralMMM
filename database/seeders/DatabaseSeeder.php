<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Primero, ejecuta el seeder de roles
        $this->call(RoleSeeder::class);

        // Crear los roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $empresaRole = Role::firstOrCreate(['name' => 'empresa']);
        $postulanteRole = Role::firstOrCreate(['name' => 'postulante']);

        // Crear un usuario administrador por defecto
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'), // Asegúrate de usar un hash seguro
        ]);

        // Asignar el rol 'admin' al usuario
        $adminUser->assignRole($adminRole);

        // Crear un usuario empresa
        $empresaUser = User::factory()->create([
            'name' => 'Empresa User',
            'email' => 'empresa@gmail.com',
            'password' => bcrypt('empresa123'), // Asegúrate de usar un hash seguro
        ]);

        // Asignar el rol 'empresa' al usuario
        $empresaUser->assignRole($empresaRole);

        // Crear un usuario postulante
        $postulanteUser = User::factory()->create([
            'name' => 'Postulante User',
            'email' => 'postulante@gmail.com',
            'password' => bcrypt('postulante123'), // Asegúrate de usar un hash seguro
        ]);

        // Asignar el rol 'postulante' al usuario
        $postulanteUser->assignRole($postulanteRole);
    }
}
