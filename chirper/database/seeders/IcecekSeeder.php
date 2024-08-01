<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Icecek;

class IcecekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Icecek::create([
            'name' => 'Su',
            'image' => 'images/su.png',
            'price' => '10',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Icecek::create([
            'name' => 'Kola',
            'image' => 'images/cola.png',
            'price' => '10',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Icecek::create([
            'name' => 'Ayran',
            'image' => 'images/ayran.png',
            'price' => '10',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Icecek::create([
            'name' => 'Cappy',
            'image' => 'images/cappy.png',
            'price' => '10',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Icecek::create([
            'name' => 'Sprite',
            'image' => 'images/sprite.png',
            'price' => '10',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Icecek::create([
            'name' => 'Soda',
            'image' => 'images/soda.png',
            'price' => '10',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Icecek::create([
            'name' => 'Meyveli Soda',
            'image' => 'images/meysoda.png',
            'price' => '10',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);
    }
}
