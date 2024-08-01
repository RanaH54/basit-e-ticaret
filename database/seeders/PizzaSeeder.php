<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pizza::create([
            'name' => 'Pizza1',
            'image' => 'images/4.png',
            'short_text' => 'AÇIKLAMA',
            'price' => '100',
            'size' => 'Büyük',
            'price_small' => 80,
            'price_medium' => 90,
            'price_large' => 100,
            'status' => '1'
        ]);

        Pizza::create([
            'name' => 'Pizza2',
            'image' => 'images/5.png',
            'short_text' => 'AÇIKLAMA',
            'price' => '100',
            'size' => 'Büyük',
            'price_small' => 80,
            'price_medium' => 90,
            'price_large' => 100,
            'status' => '1'
        ]);
        Pizza::create([
            'name' => 'Pizza3',
            'image' => 'images/6.png',
            'short_text' => 'AÇIKLAMA',
            'price' => '100',
            'size' => 'Büyük',
            'price_small' => 80,
            'price_medium' => 90,
            'price_large' => 100,
            'status' => '1'
        ]);
        Pizza::create([
            'name' => 'Pizza4',
            'image' => 'images/7.png',
            'short_text' => 'AÇIKLAMA',
            'price' => '100',
            'size' => 'Büyük',
            'price_small' => 80,
            'price_medium' => 90,
            'price_large' => 100,
            'status' => '1'
        ]);
        Pizza::create([
            'name' => 'Pizza5',
            'image' => 'images/8.png',
            'short_text' => 'AÇIKLAMA',
            'price' => '100',
            'size' => 'Büyük',
            'price_small' => 80,
            'price_medium' => 90,
            'price_large' => 100,
            'status' => '1'
        ]);
        Pizza::create([
            'name' => 'Pizza6',
            'image' => 'images/9.png',
            'short_text' => 'AÇIKLAMA',
            'price' => '100',
            'size' => 'Büyük',
            'price_small' => 80,
            'price_medium' => 90,
            'price_large' => 100,
            'status' => '1'
        ]);
        Pizza::create([
            'name' => 'Pizza7',
            'image' => 'images/10.png',
            'short_text' => 'AÇIKLAMA',
            'price' => '100',
            'size' => 'Büyük',
            'price_small' => 80,
            'price_medium' => 90,
            'price_large' => 100,
            'status' => '1'
        ]);
        Pizza::create([
            'name' => 'Pizza8',
            'image' => 'images/11.png',
            'short_text' => 'AÇIKLAMA',
            'price' => '100',
            'size' => 'Büyük',
            'price_small' => 80,
            'price_medium' => 90,
            'price_large' => 100,
            'status' => '1'
        ]);
        Pizza::create([
            'name' => 'Pizza9',
            'image' => 'images/13.png',
            'short_text' => 'AÇIKLAMA',
            'price' => '100',
            'size' => 'Büyük',
            'price_small' => 80,
            'price_medium' => 90,
            'price_large' => 100,
            'status' => '1'
        ]);


    }
}
