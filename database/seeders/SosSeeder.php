<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sos;

class SosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sos::create([
            'name' => 'Ketçap',
            'image' => 'images/sos1.png',
            'price' => '5.50',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Sos::create([
            'name' => 'Mayonez',
            'image' => 'images/sos2.png',
            'price' => '5.50',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Sos::create([
            'name' => 'Barbekü',
            'image' => 'images/sos3.png',
            'price' => '5.50',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Sos::create([
            'name' => 'Hardal',
            'image' => 'images/sos4.png',
            'price' => '5.50',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Sos::create([
            'name' => 'KetMay',
            'image' => 'images/sos5.png',
            'price' => '5.50',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Sos::create([
            'name' => 'İksir',
            'image' => 'images/sos6.png',
            'price' => '5.50',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Sos::create([
            'name' => 'Mix',
            'image' => 'images/sos7.png',
            'price' => '5.50',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);
    }
}
