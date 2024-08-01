<?php

namespace App\Http\Controllers;
use App\Models\Urun;
use Illuminate\Http\Request;

class UrunController extends Controller
{
    public function index()
    {
        $uruns = Urun::all();
        return view('front-end.pages.index', compact('uruns'));
    }

    public function createPizza(Request $request)
    {
        // Seçilen ürünlerin ID'leri ve kullanıcı tarafından verilen pizza adı
        $selectedUrunID = $request->input('urun_id', []);
        $pizzaName = $request->input('pizza_name', 'Özel Pizza');

        // Seçilen ürünleri veritabanından çek
        $selectedUruns = Urun::whereIn('id', $selectedUrunID)->get();


        // Yeni pizzanın toplam fiyatını hesapla
        $totalPrice = 75; // Baz fiyat
        foreach ($selectedUruns as $urun) {
            $totalPrice += $urun->price;
        }

        // Yeni pizzayı oluştur
        $pizzaKey = implode('-', $selectedUrunID) . '-' . $pizzaName; // Pizza anahtarı oluştur
        $urunItem = session('urun', []);

        if (array_key_exists($pizzaKey, $urunItem)) {
            $urunItem[$pizzaKey]['quantity'] += 1; // Pizza zaten varsa miktarı artır
        } else {
            $urunItem[$pizzaKey] = [
                'name' => $pizzaName,
                'image' => 'images/hamtab.png', // Pizza resmi
                'price' => $totalPrice,
                'ingredients' => $selectedUruns->pluck('name')->toArray(),
                'quantity' => 1
            ];
        }
        if (empty($selectedUrunID)) {
            return back()->withErrors('Lütfen en az bir ürün seçin.');
        }

        session(['urun' => $urunItem]);
        return back()->withSuccess('Özel pizza sepete eklendi');
    }
}
