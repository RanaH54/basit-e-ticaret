<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tatli;

class TatliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tatli::create([
            'name' => 'Baklava',
            'image' => 'images/baklava.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Pasta',
            'image' => 'images/dilim.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Çikolatalı Top',
            'image' => 'images/topcik.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Kremalı Top',
            'image' => 'images/topcik2.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Browni Kek ',
            'image' => 'images/topkek.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Suffle',
            'image' => 'images/suffle.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'KremJöle',
            'image' => 'images/jole.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Puding',
            'image' => 'images/puding.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Waffle',
            'image' => 'images/waffle.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Sarma Waffle',
            'image' => 'images/sarmawaffle.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Donat',
            'image' => 'images/donat.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Makaron',
            'image' => 'images/macron.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Cookie',
            'image' => 'images/cookie.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);

        Tatli::create([
            'name' => 'Dondurma',
            'image' => 'images/dondurma.png',
            'price' => '15',
            'size' =>'standart',
            'status' => '1',
            'counts' => 'bos',
        ]);
    }
}
