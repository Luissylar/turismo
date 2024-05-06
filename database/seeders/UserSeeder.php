<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Carlos',
            'email' => 'tardidaw@gmail.com',
            'password' => Hash::make('admin1234')

        ])->assignRole('admin');


        User::factory(10)->create();
    }
}
