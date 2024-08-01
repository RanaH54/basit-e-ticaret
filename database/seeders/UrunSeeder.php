<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Urun;

class UrunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Urun::create([
            'name'=>'Mantar',
            'image'=>'images/mantar.png',
            'price'=>'2',
            'status' => '1'
        ]);
        Urun::create([
            'name'=>'Zeytin',
            'image'=>'images/zeytin.png',
            'price'=>'2',
            'status' => '1'
        ]);
        Urun::create([
            'name'=>'Sucuk',
            'image'=>'images/sucuk.png',
            'price'=>'2',
            'status' => '1'
        ]);
        Urun::create([
            'name'=>'Soğan',
            'image'=>'images/sogan.png',
            'price'=>'2',
            'status' => '1'
        ]);
        Urun::create([
            'name'=>'Domates',
            'image'=>'images/domates.png',
            'price'=>'2',
            'status' => '1'
        ]);
        Urun::create([
            'name'=>'Mısır',
            'image'=>'images/misir.png',
            'price'=>'2',
            'status' => '1'
        ]);
        Urun::create([
            'name'=>'Pastırma',
            'image'=>'images/pastirma.png',
            'price'=>'2',
            'status' => '1'
        ]);
        Urun::create([
            'name'=>'Nane',
            'image'=>'images/nane.png',
            'price'=>'2',
            'status' => '1'
        ]);
        Urun::create([
            'name'=>'Kaşar',
            'image'=>'images/kasar.png',
            'price'=>'2',
            'status' => '1'
        ]);
    }
}







