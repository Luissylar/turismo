<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seeders para precios
        Price::create([
            'name' => 'gratis',
            'value' => 0
        ]);
        Price::create([
            'name' => '19.99 Economico',
            'value' => 19.99
        ]);
        Price::create([
            'name' => '39.99 Regular',
            'value' => 39.99
        ]);
        Price::create([
            'name' => '59.99 Premium',
            'value' => 59.99
        ]);
        Price::create([
            'name' => '79.99 VIP',
            'value' => 79.99
        ]);
        Price::create([
            'name' => '99.99 Elite',
            'value' => 99.99
        ]);
        Price::create([
            'name' => '199.99 Pro',
            'value' => 199.99
        ]);
        Price::create([
            'name' => '299.99 Master',
            'value' => 299.99
        ]);
        Price::create([
            'name' => '399.99 Legend',
            'value' => 399.99
        ]);
        Price::create([
            'name' => '499.99 God',
            'value' => 499.99
        ]);
        Price::create([
            'name' => '599.99 Titan',
            'value' => 599.99
        ]);
        Price::create([
            'name' => '699.99 Supreme',
            'value' => 699.99
        ]); 
        Price::create([
            'name' => '799.99 Ultra',
            'value' => 799.99
        ]);
        Price::create([
            'name' => '899.99 Mega',
            'value' => 899.99
        ]); 
        Price::create([
            'name' => '999.99 Epic',
            'value' => 999.99
        ]);
        Price::create([
            'name' => '1999.99 Legendary',
            'value' => 1999.99
        ]);
        Price::create([
            'name' => '2999.99 Mythic',
            'value' => 2999.99
        ]);
        Price::create([
            'name' => '3999.99 Divine',
            'value' => 3999.99
        ]);
        Price::create([
            'name' => '4999.99 Immortal',
            'value' => 4999.99
        ]);
        Price::create([
            'name' => '5999.99 Godlike',
            'value' => 5999.99
        ]);
        Price::create([
            'name' => '6999.99 Supreme',
            'value' => 6999.99
        ]);
        Price::create([
            'name' => '7999.99 Ultra',
            'value' => 7999.99
        ]);
    }
}
