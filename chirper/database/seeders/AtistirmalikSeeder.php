<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Atistirmalik;

class AtistirmalikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Atistirmalik::create([
            'name' => 'Burger',
            'image' => 'images/burger1.png',
            'price' => '20',
            'size' =>'standart',
            'aciklama'=>'AÇIKLAMA',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Atistirmalik::create([
            'name' => 'Burger1',
            'image' => 'images/burger2.png',
            'price' => '20',
            'size' =>'standart',
            'aciklama'=>'AÇIKLAMA',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Atistirmalik::create([
            'name' => 'Burger2',
            'image' => 'images/burger3.png',
            'price' => '20',
            'size' =>'standart',
            'aciklama'=>'AÇIKLAMA',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Atistirmalik::create([
            'name' => 'Patates',
            'image' => 'images/patates.png',
            'price' => '20',
            'size' =>'standart',
            'aciklama'=>'AÇIKLAMA',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Atistirmalik::create([
            'name' => 'Soğan Halkası',
            'image' => 'images/soganhalkasi.png',
            'price' => '20',
            'size' =>'standart',
            'aciklama'=>'AÇIKLAMA',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Atistirmalik::create([
            'name' => 'Sandviç',
            'image' => 'images/sandviç.png',
            'price' => '20',
            'size' =>'standart',
            'aciklama'=>'AÇIKLAMA',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Atistirmalik::create([
            'name' => 'Kroket',
            'image' => 'images/kroket.png',
            'price' => '20',
            'size' =>'standart',
            'aciklama'=>'AÇIKLAMA',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Atistirmalik::create([
            'name' => 'Nugget',
            'image' => 'images/nugget.png',
            'price' => '20',
            'size' =>'standart',
            'aciklama'=>'AÇIKLAMA',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Atistirmalik::create([
            'name' => 'Sosisli',
            'image' => 'images/sosisli.png',
            'price' => '20',
            'size' =>'standart',
            'aciklama'=>'AÇIKLAMA',
            'status' => '1',
            'counts' => 'bos',
        ]);
        Atistirmalik::create([
            'name' => 'Tavuk Kutusu',
            'image' => 'images/but.png',
            'price' => '20',
            'size' =>'standart',
            'aciklama'=>'AÇIKLAMA',
            'status' => '1',
            'counts' => 'bos',
        ]);
    }
}
