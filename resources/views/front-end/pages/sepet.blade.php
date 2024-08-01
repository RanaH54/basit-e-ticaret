@extends('front-end.layout.layout')
@section('content')
<div class="flex justify-center container px-5 mx-auto py-8 sm:py-20">
    <div class="flex flex-col w-4/5">
        <div id="cartItem">
            @if($cartItem)
                <!-- Pizza Sepet İçeriği -->
                <div class="container mx-auto py-4">
                    @if ($cartItem)
                        @foreach ($cartItem as $cartKey => $cart)
                            @if (isset($cart['pizza_id']))
                            <div class="flex flex-wrap justify-around gap-8 py-8 sm:gap-20">
                                <div class="">
                                    <div class="bg-white rounded-lg shadow p-4 relative">
                                        <div class="flex flex-wrap gap-4 justify-center items-center">
                                            <div class="relative sm:-ml-24">
                                                @if(isset($cart['image']))
                                                    <img src="{{ asset($cart['image']) }}" alt="Ürün Resmi" class="w-24 h-24 sm:w-44 sm:h-44 object-cover rounded overflow-visible">
                                                @endif
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                @if(isset($cart['name']))
                                                    <h3 class="font-semibold">{{ $cart['name'] }}</h3>
                                                @endif
                                                <p class="text-gray-600">Fiyat: {{ $cart['price'] * $cart['quantity'] }}₺</p>
                                                <p class="text-gray-600">Boyut: {{ $cart['size'] ?? 'Standart' }}</p>
                                                <p class="text-gray-600">Miktar: {{ $cart['quantity'] }}</p>
                                            </div>
                                        </div>
                                        <form action="{{ route('sepet.remove') }}" method="POST" class="absolute top-2 right-2">
                                            @csrf
                                            <input type="hidden" name="pizza_id" value="{{ $cart['pizza_id'] ?? '' }}">
                                            <input type="hidden" name="size" value="{{ $cart['size'] ?? 'Standart' }}">
                                            <button type="submit" class="text-red-500 focus:outline-none">X</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                <!-- İçecek Sepet İçeriği -->
                <div class="container mx-auto py-4">
                    @if ($cartItem)
                        @foreach ($cartItem as $icecekKey => $icKey)
                            @if (isset($icKey['icecek_id']))
                            <div class="flex flex-wrap justify-around gap-8 py-8 sm:gap-20">
                                <div class="">
                                    <div class="bg-white rounded-lg shadow p-4 relative">
                                        <div class="flex flex-wrap gap-4 justify-center items-center">
                                            <div class="relative sm:-ml-12">
                                                @if(isset($icKey['image']))
                                                    <img src="{{ asset($icKey['image']) }}" alt="Ürün Resmi" class="w-12 h-10 sm:w-44 sm:h-44 object-cover rounded overflow-visible">
                                                @endif
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                @if(isset($icKey['name']))
                                                    <h3 class="font-semibold">{{ $icKey['name'] }}</h3>
                                                @endif
                                                <p class="text-gray-600">Fiyat: {{ $icKey['price'] * $icKey['quantity'] }}₺</p>
                                                <p class="text-gray-600">Miktar: {{ $icKey['quantity'] }}</p>
                                            </div>
                                        </div>
                                        <form action="{{ route('sepet.iceceksil') }}" method="POST" class="absolute top-2 right-2">
                                            @csrf
                                            <input type="hidden" name="icecek_id" value="{{ $icKey['icecek_id'] ?? '' }}">
                                            <button type="submit" class="text-red-500 focus:outline-none">X</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                <!-- Atıştırmalık Sepet İçeriği -->
                <div class="container mx-auto py-4">
                    @if ($cartItem)
                        @foreach ($cartItem as $atistirmalikKey => $atKey)
                            @if (isset($atKey['atistirmalik_id']))
                            <div class="flex flex-wrap justify-around gap-8 py-8 sm:gap-20">
                                <div class="">
                                    <div class="bg-white rounded-lg shadow p-4 relative">
                                        <div class="flex flex-wrap gap-4 justify-center items-center">
                                            <div class="relative sm:-ml-20">
                                                @if(isset($atKey['image']))
                                                    <img src="{{ asset($atKey['image']) }}" alt="Ürün Resmi" class="w-20 h-20 sm:w-44 sm:h-44 object-cover rounded overflow-visible">
                                                @endif
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                @if(isset($atKey['name']))
                                                    <h3 class="font-semibold">{{ $atKey['name'] }}</h3>
                                                @endif
                                                <p class="text-gray-600">Fiyat: {{ $atKey['price'] * $atKey['quantity'] }}₺</p>
                                                <p class="text-gray-600">Miktar: {{ $atKey['quantity'] }}</p>
                                            </div>
                                        </div>
                                        <form action="{{ route('sepet.atistirmaliksil') }}" method="POST" class="absolute top-2 right-2">
                                            @csrf
                                            <input type="hidden" name="atistirmalik_id" value="{{ $atKey['atistirmalik_id'] ?? '' }}">
                                            <button type="submit" class="text-red-500 focus:outline-none">X</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                <!-- Sos Sepet İçeriği -->
                <div class="container mx-auto py-4">
                    @if ($cartItem)
                        @foreach ($cartItem as $sosKey => $sos)
                            @if (isset($sos['sos_id']))
                            <div class="flex flex-wrap justify-around gap-8 py-8 sm:gap-20">
                                <div class="">
                                    <div class="bg-white rounded-lg shadow p-4 relative">
                                        <div class="flex flex-wrap gap-4 justify-center items-center">
                                            <div class="relative sm:-ml-16">
                                                @if(isset($sos['image']))
                                                    <img src="{{ asset($sos['image']) }}" alt="Ürün Resmi" class="w-20 h-20 sm:w-44 sm:h-44 object-cover rounded overflow-visible">
                                                @endif
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                @if(isset($sos['name']))
                                                    <h3 class="font-semibold">{{ $sos['name'] }}</h3>
                                                @endif
                                                <p class="text-gray-600">Fiyat: {{ $sos['price'] * $sos['quantity'] }}₺</p>
                                                <p class="text-gray-600">Miktar: {{ $sos['quantity'] }}</p>
                                            </div>
                                        </div>
                                        <form action="{{ route('sepet.sossil') }}" method="POST" class="absolute top-2 right-2">
                                            @csrf
                                            <input type="hidden" name="sos_id" value="{{ $sos['sos_id'] ?? '' }}">
                                            <button type="submit" class="text-red-500 focus:outline-none">X</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                <!-- Tatlı Sepet İçeriği -->
                <div class="container mx-auto py-4">
                    @if ($cartItem)
                        @foreach ($cartItem as $tatliKey => $tatli)
                            @if (isset($tatli['tatli_id']))
                            <div class="flex flex-wrap justify-around gap-8 py-8 sm:gap-20">
                                <div class="">
                                    <div class="bg-white rounded-lg shadow p-4 relative">
                                        <div class="flex flex-wrap gap-4 justify-center items-center">
                                            <div class="relative sm:-ml-20">
                                                @if(isset($tatli['image']))
                                                    <img src="{{ asset($tatli['image']) }}" alt="Ürün Resmi" class="w-20 h-20 sm:w-44 sm:h-44 object-cover rounded overflow-visible">
                                                @endif
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                @if(isset($tatli['name']))
                                                    <h3 class="font-semibold">{{ $tatli['name'] }}</h3>
                                                @endif
                                                <p class="text-gray-600">Fiyat: {{ $tatli['price'] * $tatli['quantity'] }}₺</p>
                                                <p class="text-gray-600">Miktar: {{ $tatli['quantity'] }}</p>
                                            </div>
                                        </div>
                                        <form action="{{ route('sepet.tatlisil') }}" method="POST" class="absolute top-2 right-2">
                                            @csrf
                                            <input type="hidden" name="tatli_id" value="{{ $tatli['tatli_id'] ?? '' }}">
                                            <button type="submit" class="text-red-500 focus:outline-none">X</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                <!-- Özel Pizza Sepet İçeriği -->
                <div class="container mx-auto py-4">
                    @if (!empty($cartItem))
                        {{-- Özel Pizzalar --}}
                            <div class="flex flex-wrap justify-around gap-4 py-4 sm:gap-20">
                                @foreach ($cartItem as $cartKey => $cart)
                                    @if (isset($cart['type']) && $cart['type'] === 'ozel')
                                        <div class="">
                                            <div class="bg-white rounded-lg shadow p-4 relative">
                                                <div class="flex flex-wrap gap-4 justify-center items-center">
                                                    <div class="relative sm:-ml-24">
                                                        @if(isset($cart['image']))
                                                            <img src="{{ asset($cart['image']) }}" alt="Ürün Resmi" class="w-24 h-24 sm:w-44 sm:h-44 object-cover rounded overflow-visible">
                                                        @endif
                                                    </div>
                                                    <div class="flex flex-col justify-center">
                                                        @if(isset($cart['name']))
                                                            <h3 class="font-semibold">{{ $cart['name'] }}</h3>
                                                        @endif
                                                        <p class="text-gray-600">Fiyat: {{ $cart['price'] * $cart['quantity'] }}₺</p>
                                                        <p class="text-gray-600">Miktar: {{ $cart['quantity'] }}</p>
                                                        <p class="text-gray-600">İçindekiler: {{ implode(', ', $cart['ingredients']) }}</p>
                                                    </div>
                                                </div>
                                                <form action="{{ route('sepet.pizzasil') }}" method="POST" class="absolute top-2 right-2">
                                                    @csrf
                                                    <input type="hidden" name="ozelpizza_key" value="{{ $cartKey }}">
                                                    <button type="submit" class="text-red-500 focus:outline-none">X</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Sepet Özeti -->
        <div class="container mx-auto py-8">
            <div class="bg-white rounded-lg shadow p-4 mb-8">
                <h2 class="text-lg font-semibold mb-4">Sepet Özeti</h2>
                <p id="totalqty">Toplam Ürün Sayısı: {{$totalqty}}</p>
                <p id="totalPrice" >Toplam Tutar: {{$totalPrice}}₺</p>
            </div>
        </div>


        <!-- Ödeme Bilgileri ve İşlemler -->
        <div class="container mx-auto py-8">
            <div class="bg-white rounded-lg shadow p-4 mb-8">
                <h2 class="text-lg font-semibold mb-4">Ödeme Bilgileri ve İşlemler</h2>
                <!-- Ödeme bilgileri formu -->
                <form id="paymentForm" action="{{ route('sepet.onayla') }}" method="POST">
                    @csrf
                    <!-- Ödeme Bilgileri Girişleri -->
                    <div class="mb-4">
                        <fieldset class="space-y-4">
                            <div>
                                <input id="kapida" type="radio" name="odeme" value="kapida" class="peer" checked />
                                <label for="kapida" class="peer-checked:text-sky-500">Kapıda Ödeme</label>
                            </div>
                            <div>
                                <input id="kart" type="radio" name="odeme" value="kart" class="peer" />
                                <label for="kart" class="peer-checked:text-sky-500">Kart İle Ödeme</label>
                                <input type="text" id="cardNumber" name="cardNumber" class="border rounded-lg px-4 py-2 w-1/4" placeholder="XXXX XXXX XXXX XXXX">
                            </div>
                        </fieldset>
                    </div>
                    <!-- Onaylama düğmesi -->
                    <div class="flex justify-between">
                        <button type="submit" class="bg-green-500 text-white font-semibold px-4 py-2 rounded hover:bg-green-600">Sepeti Onayla</button>
                    </div>
                </form>
                @if(Session::has('successMessage'))
                    <div class="mt-4 text-green-500 font-semibold">
                        {{ Session::get('successMessage') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
