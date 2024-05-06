<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserLogin;
use App\Models\User;

class UserLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();  // Asegúrate de tener usuarios en la base de datos.

        foreach ($users as $user) {
            UserLogin::factory()
                ->count(rand(1, 5))  // Especifica la cantidad de registros a crear aquí.
                ->create(['user_id' => $user->id]);  // Asigna el user_id durante la creación.
        }
    }
}
