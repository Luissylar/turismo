<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User; // Import the User class from the appropriate namespace

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiar el cache de permisos para evitar problemas
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear roles
        $roleAdmin = Role::create(['name' => 'admin']);

        $role2 = Role::create(['name' => 'dos']);


        Permission::create(['name' => 'admin.dashboard'])->syncRoles([$roleAdmin,$role2]);
    }
}
