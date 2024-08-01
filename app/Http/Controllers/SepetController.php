<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use App\Models\Icecek;
use App\Models\Atistirmalik;
use App\Models\Sos;
use App\Models\Tatli;
use App\Models\Urun;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SepetController extends Controller
{
        public function index(){
        $cartItem = session('cart',[]);
        $totalPrice = 0;
        foreach($cartItem as $cart){
            $totalPrice += $cart['price'] * $cart['quantity'];
        }

        $totalqty = 0;
        foreach($cartItem as $cart){
            $totalqty += $cart['quantity'];
        }
        return view('front-end.pages.sepet' , compact('cartItem','totalPrice','totalqty' ));
        }

        public function add(Request $request) {
            $pizzaID = $request->pizza_id;
            $size = $request->size;
            $quantity = $request->quantity;

            $siparis = Pizza::find($pizzaID);

            if (!$siparis) {
                return back()->withError('Sipariş Bulunamadı');
            }

            $price = 0;
            if ($size === 'small') {
                $price = $siparis->price_small;
            } elseif ($size === 'medium') {
                $price = $siparis->price_medium;
            } elseif ($size === 'large') {
                $price = $siparis->price_large;
            }

            $cartKey = 'pizza-' . $pizzaID . '-' . $size;

            $cartItem = session('cart', []);

            if (array_key_exists($cartKey, $cartItem)) {
                $cartItem[$cartKey]['quantity'] += $quantity;
            } else {
                $cartItem[$cartKey] = [
                    'pizza_id' => $pizzaID,
                    'image' => $siparis->image,
                    'name' => $siparis->name,
                    'price' => $price,
                    'quantity' => $quantity,
                    'size' => $size,
                ];
            }

            session(['cart' => $cartItem]);

            return back()->withSuccess('Sipariş Sepete Eklendi');
        }

        public function remove(Request $request) {
            $pizzaID = $request->pizza_id;
            $size = $request->size;
            $cartKey = 'pizza-' . $pizzaID . '-' . $size;

            $cartItem = session('cart', []);

            if (array_key_exists($cartKey, $cartItem)) {
                if ($cartItem[$cartKey]['quantity'] > 1) {
                    $cartItem[$cartKey]['quantity'] -= 1;
                } else {
                    unset($cartItem[$cartKey]);
                }
            }

            session(['cart' => $cartItem]);

            return back()->with('success', 'Sepetten Kaldırıldı');
        }


        public function icecekekle(Request $request) {
            $icecekID = $request->icecek_id;
            $quantity = $request->quantity;

            $iceceksiparis = Icecek::find($icecekID);

            if (!$iceceksiparis) {
                return back()->withError('Sipariş Bulunamadı');
            }

            $icecekKey = 'icecek-' . $icecekID;

            $cartItem = session('cart', []);

            if (array_key_exists($icecekKey, $cartItem)) {
                $cartItem[$icecekKey]['quantity'] += $quantity;
            } else {
                $cartItem[$icecekKey] = [
                    'icecek_id' => $icecekID,
                    'image' => $iceceksiparis->image,
                    'name' => $iceceksiparis->name,
                    'price' => $iceceksiparis->price,
                    'quantity' => $quantity,
                ];
            }

            session(['cart' => $cartItem]);

            return back()->withSuccess('Sipariş Sepete Eklendi');
        }

        public function iceceksil(Request $request) {
            $icecekID = $request->input('icecek_id');

            // Doğru anahtarın oluşturulması
            $icecekKey = 'icecek-' . $icecekID;

            // Sepet öğelerini session'dan al
            $cartItem = session('cart', []);

            // Sepet anahtarının var olup olmadığını kontrol et
            if (array_key_exists($icecekKey, $cartItem)) {
                // Miktarın 1'den fazla olup olmadığını kontrol et
                if ($cartItem[$icecekKey]['quantity'] > 1) {
                    $cartItem[$icecekKey]['quantity'] -= 1;
                } else {
                    // Miktar 1 ise sepetten kaldır
                    unset($cartItem[$icecekKey]);
                }
            } else {
                return back()->withErrors('İçecek sepette bulunamadı');
            }

            // Güncellenmiş sepeti session'a kaydet
            session(['cart' => $cartItem]);

            return back()->with('success', 'İçecek sepetten kaldırıldı');
        }

        public function atistirmalikekle(Request $request) {
            $atistirmalikID = $request->atistirmalik_id;
            $quantity = $request->quantity;

            $atistirmaliksiparis = Atistirmalik::find($atistirmalikID);

            if (!$atistirmaliksiparis) {
                return back()->withError('Sipariş Bulunamadı');
            }

            $atistirmalikKey = 'atistirmalik-' . $atistirmalikID;

            $cartItem = session('cart', []);

            if (array_key_exists($atistirmalikKey, $cartItem)) {
                $cartItem[$atistirmalikKey]['quantity'] += $quantity;
            } else {
                $cartItem[$atistirmalikKey] = [
                    'atistirmalik_id' => $atistirmalikID,
                    'image' => $atistirmaliksiparis->image,
                    'name' => $atistirmaliksiparis->name,
                    'price' => $atistirmaliksiparis->price,
                    'quantity' => $quantity,
                ];
            }

            session(['cart' => $cartItem]);

            return back()->withSuccess('Sipariş Sepete Eklendi');
        }

        public function atistirmaliksil(Request $request) {
            $atistirmalikID = $request->input('atistirmalik_id');

            // Doğru anahtarın oluşturulması
            $atistirmalikKey = 'atistirmalik-' . $atistirmalikID;

            // Sepet öğelerini session'dan al
            $cartItem = session('cart', []);

            // Sepet anahtarının var olup olmadığını kontrol et
            if (array_key_exists($atistirmalikKey, $cartItem)) {
                // Miktarın 1'den fazla olup olmadığını kontrol et
                if ($cartItem[$atistirmalikKey]['quantity'] > 1) {
                    $cartItem[$atistirmalikKey]['quantity'] -= 1;
                } else {
                    // Miktar 1 ise sepetten kaldır
                    unset($cartItem[$atistirmalikKey]);
                }
            } else {
                return back()->withErrors('Atıştırmalık sepette bulunamadı');
            }

            // Güncellenmiş sepeti session'a kaydet
            session(['cart' => $cartItem]);

            return back()->with('success', 'Atıştırmalık sepetten kaldırıldı');
        }

        public function sosekle(Request $request) {
            $sosID = $request->sos_id;
            $quantity = $request->quantity;

            $sossiparis = Sos::find($sosID);

            if (!$sossiparis) {
                return back()->withError('Sipariş Bulunamadı');
            }

            $sosKey = 'sos-' . $sosID;

            $cartItem = session('cart', []);

            if (array_key_exists($sosKey, $cartItem)) {
                $cartItem[$sosKey]['quantity'] += $quantity;
            } else {
                $cartItem[$sosKey] = [
                    'sos_id' => $sosID,
                    'image' => $sossiparis->image,
                    'name' => $sossiparis->name,
                    'price' => $sossiparis->price,
                    'quantity' => $quantity,
                ];
            }

            session(['cart' => $cartItem]);

            return back()->withSuccess('Sipariş Sepete Eklendi');
        }

        public function sossil(Request $request) {
            $sosID = $request->input('sos_id');

            // Doğru anahtarın oluşturulması
            $sosKey = 'sos-' . $sosID;

            // Sepet öğelerini session'dan al
            $cartItem = session('cart', []);

            // Sepet anahtarının var olup olmadığını kontrol et
            if (array_key_exists($sosKey, $cartItem)) {
                // Miktarın 1'den fazla olup olmadığını kontrol et
                if ($cartItem[$sosKey]['quantity'] > 1) {
                    $cartItem[$sosKey]['quantity'] -= 1;
                } else {
                    // Miktar 1 ise sepetten kaldır
                    unset($cartItem[$sosKey]);
                }
            } else {
                return back()->withErrors('Sos sepette bulunamadı');
            }

            // Güncellenmiş sepeti session'a kaydet
            session(['cart' => $cartItem]);

            return back()->with('success', 'Sos sepetten kaldırıldı');
        }

        public function tatliekle(Request $request) {
            $tatliID = $request->tatli_id;
            $quantity = $request->quantity;

            $tatlisiparis = Tatli::find($tatliID);

            if (!$tatlisiparis) {
                return back()->withError('Sipariş Bulunamadı');
            }

            $tatliKey = 'tatli-' . $tatliID;

            $cartItem = session('cart', []);

            if (array_key_exists($tatliKey, $cartItem)) {
                $cartItem[$tatliKey]['quantity'] += $quantity;
            } else {
                $cartItem[$tatliKey] = [
                    'tatli_id' => $tatliID,
                    'image' => $tatlisiparis->image,
                    'name' => $tatlisiparis->name,
                    'price' => $tatlisiparis->price,
                    'quantity' => $quantity,
                ];
            }

            session(['cart' => $cartItem]);

            return back()->withSuccess('Sipariş Sepete Eklendi');
        }

        public function tatlisil(Request $request) {
            $tatliID = $request->input('tatli_id');

            // Doğru anahtarın oluşturulması
            $tatliKey = 'tatli-' . $tatliID;

            // Sepet öğelerini session'dan al
            $cartItem = session('cart', []);

            // Sepet anahtarının var olup olmadığını kontrol et
            if (array_key_exists($tatliKey, $cartItem)) {
                // Miktarın 1'den fazla olup olmadığını kontrol et
                if ($cartItem[$tatliKey]['quantity'] > 1) {
                    $cartItem[$tatliKey]['quantity'] -= 1;
                } else {
                    // Miktar 1 ise sepetten kaldır
                    unset($cartItem[$tatliKey]);
                }
            } else {
                return back()->withErrors('tatli sepette bulunamadı');
            }

            // Güncellenmiş sepeti session'a kaydet
            session(['cart' => $cartItem]);

            return back()->with('success', 'Sos sepetten kaldırıldı');
        }

        public function pizzaekle(Request $request)
        {
            // Gelen verileri al
            $selectedUrunID = $request->input('urun_id', []);
            $ozelpizzaName = $request->input('ozelpizza_name', 'Özel Pizza');
            $quantity = 1;

            // Seçilen ürünleri veritabanından çek
            $selectedUruns = Urun::whereIn('id', $selectedUrunID)->get();

            // Yeni pizzanın toplam fiyatını hesapla
            $toplamPrice = 75; // Baz fiyat
            foreach ($selectedUruns as $urun) {
                $toplamPrice += $urun->price;
            }

            // Yeni pizzayı oluştur
            $ozelpizzaKey = 'ozelpizza-' . implode('-', $selectedUrunID) . '-' . $ozelpizzaName; // Pizza anahtarı oluştur
            $cartItem = session('cart', []);

            if (array_key_exists($ozelpizzaKey, $cartItem)) {
                $cartItem[$ozelpizzaKey]['quantity'] += 1; // Pizza zaten varsa miktarı artır
            } else {
                $cartItem[$ozelpizzaKey] = [
                    'name' => $ozelpizzaName,
                    'image' => 'images/bon.png', // Pizza resmi
                    'price' => $toplamPrice,
                    'ingredients' => $selectedUruns->pluck('name')->toArray(),
                    'quantity' => $quantity,
                    'type' => 'ozel'
                ];
            }

            if (empty($selectedUrunID)) {
                return back()->withErrors('Lütfen en az bir ürün seçin.');
            }

            // Oturuma 'urun' verisini ekle
            session(['cart' => $cartItem]);

            return back()->withSuccess('Özel pizza sepete eklendi');
        }

        public function pizzasil(Request $request)
        {
            $ozelpizzaKey = $request->input('ozelpizza_key');

            // Sepet öğelerini session'dan al
            $cartItem = session('cart', []);

            // Sepet anahtarının var olup olmadığını kontrol et
            if (array_key_exists($ozelpizzaKey, $cartItem)) {
                // Miktarın 1'den fazla olup olmadığını kontrol et
                if ($cartItem[$ozelpizzaKey]['quantity'] > 1) {
                    $cartItem[$ozelpizzaKey]['quantity'] -= 1;
                } else {
                    // Miktar 1 ise sepetten kaldır
                    unset($cartItem[$ozelpizzaKey]);
                }

                // Güncellenmiş sepeti session'a kaydet
                session(['cart' => $cartItem]);

                return back()->with('success', 'Pizza sepetten kaldırıldı');
            } else {
                return back()->withErrors('Pizza sepette bulunamadı');
            }
        }


        public function profile()
        {
            $user = Auth::user();
            $orders = $user->orders; // Kullanıcının siparişlerini al
            return view('profile', compact('user', 'orders'));
        }


        public function onayla(Request $request)
        {
            // Sepet onaylandıktan sonra bir mesaj döndürelim
            $message = 'Sepetiniz başarıyla onaylandı!';

            // Flash mesaj olarak döndürelim
            Session::flash('successMessage', $message);
            $cartItem = session('cart',[]);

            // Sipariş oluşturma işlemleri
            $user = Auth::user();

            foreach ($cartItem as $item) {
                $order = new Order();
                $order->user_id = $user->id;
                $order->pizza_id = $item['pizza_id'] ?? null; // Eğer bu alanlar varsa
                $order->icecek_id = $item['icecek_id'] ?? null;
                $order->atistirmalik_id = $item['atistirmalik_id'] ?? null;
                $order->sos_id = $item['sos_id'] ?? null;
                $order->tatli_id = $item['tatli_id'] ?? null;
                $order->name = $item['name'] ?? null;
                $order->total_amount = $item['total_amount'] ?? 0.00; // total_amount alanını ayarlayın
                $order->save();
            }
            // Sepeti temizleyelim
            Session::forget('cart', $cartItem);

            // Sepet onaylandıktan sonra anasayfaya yönlendirme yapalım
            return redirect()->route('sepet');
        }
}
