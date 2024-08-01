@extends('front-end.layout.layout')
@section('content')
<!--text-->
<div class="relative text-6xl max-md:text-4xl max-sm:text-2xl">
    <div class="text-center text-yellow-500">
        <h1 style="font-family: 'Over the Rainbow', sans-serif;">ARADIGIN</h1>
    </div>
    <div class="text-center text-red-800">
        <h1 style="font-family: 'Rubik Doodle Shadow', sans-serif;">LEZZET</h1>
    </div>
</div>
<div class="grid grid-cols-2 justify-items-center items-center">
    <img src="images/oksol.png" alt="main" class="w-52 h-52 max-md:w-40 max-md:h-40 max-sm:w-32 max-sm:h-32">
    <img src="images/oksag.png" alt="main" class="w-52 h-52 max-md:w-40 max-md:h-40 max-sm:w-32 max-sm:h-32">
</div>

<!--pizza görsel-->
<div class="container py-24 max-md:py-10 max-sm:py-1 mx-auto">
    <div class="flex flex-wrap gap-4 justify-center py-20">
        @if (!empty($pizzas) && $pizzas->count() > 0)
        @foreach ($pizzas as $pizza)
        <div class="flex p-4 justify-center lg:w-1/4 md:w-auto w-full relative">
            <div class="relative">
                <img src="{{ asset($pizza->image) }}" alt="image" class="w-60 h-60 max-sm:w-44 max-sm:h-44 cursor-pointer transform transition-transform duration-300 hover:rotate-180"
                    onclick="openModal({{ $pizza->id }})"
                    onmouseenter="showInfo(this)"
                    onmouseleave="hideInfo(this)"
                    data-id="{{ $pizza->id }}"
                    data-name="{{ $pizza->name }}"
                    data-description="{{ $pizza->short_text }}"
                    data-price-small="{{ $pizza->getPriceBySize('small') }}"
                    data-price-medium="{{ $pizza->getPriceBySize('medium') }}"
                    data-price-large="{{ $pizza->getPriceBySize('large') }}">
            </div>
        </div>
        @endforeach
    @endif

    <div id="blurBackground" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 backdrop-blur"></div>
    <!-- Modal -->
    <div id="pizzaModal" class="container mx-auto py-8 fixed inset-0 z-50 hidden p-20 border flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg max-w-4xl mx-auto p-8 max-sm:p-12 relative">
            <span class="absolute top-2 right-2 text-gray-500 cursor-pointer text-2xl font-semibold" onclick="closeModal()">&times;</span>
            <div class="mx-auto max-sm:p-10 flex max-md:flex-wrap">
                <!-- Görsel Kısmı -->
                <div class="w-full md:w-1/2 flex justify-center items-center">
                    <img id="modalPizzaImage" src="" alt="" class="mb-4 rounded-lg w-80 object-cover">
                </div>
                <!-- Bilgiler Kısmı -->
                <div class="w-full md:w-1/2 p-4">
                    <h1 class="text-2xl font-semibold mb-4" id="modalPizzaName"></h1>
                    <p class="text-gray-700 mb-4" id="modalPizzaDescription"></p>
                    <p class="text-gray-800 font-semibold text-xl mb-4" id="pizza-price"></p>
                    <form action="{{ route('sepet.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pizza_id" id="pizzaIdInput" value="modalPizzaId">
                        <div class="flex items-center mb-4">
                            <label for="size" class="mr-2">Boyut:</label>
                            <select name="size" id="size" class="border rounded-md px-3 py-1" onchange="updatePrice()">
                                <option value="small"  id="Küçük" data-price="80">Küçük</option>
                                <option value="medium"  id="Orta" data-price="90">Orta</option>
                                <option value="large"  id="Büyük" data-price="100">Büyük</option>
                            </select>
                        </div>
                        <div class="flex items-center mb-4">
                            <label for="quantity" class="mr-2">Miktar:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="10" class="border rounded-md px-3 py-1 w-16">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded hover:bg-blue-600 mt-4">Sepete Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!--pizza özelleştirme-->
<div class="py-20 max-md:py-10 max-sm:py-1">
    <div class="grid grid-cols-3 content-start w-full">
        <img src="images/ust.png" alt="">
        <img src="images/ust1.png" alt="">
        <img src="images/ust.png" alt="">
    </div>
    <div class="container mx-auto p-4">
        <div class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 mx-auto">
                <div class="lg:w-4/5 mx-auto flex">
                    <div class="md:w-1/2 flex py-10 max-md:py-5 w-full">
                        <img alt="" class="w-72 h-72 max-sm:h-[80%] max-sm:w-[80%]" src="images/idea.png">
                    </div>
                    <div class="md:w-1/2 lg:pr-10 lg:py-6 mb-6 lg:mb-0 max-md:w-full flex justify-end items-center">
                        <div class="text-4xl max-md:text-2xl max-sm:text-[12px] text-red-800" style="font-family: 'Rubik Doodle Shadow', sans-serif;">
                            Pizzanı Kendin <br> Tasarlamaya <br> Ne Dersin? <br>
                            <button id="openPopupButton" class="py-2 px-2 cursor-pointer rounded-full bg-white border border-red-800 p-5 text-2xl max-md:text-xl max-sm:text-xs">
                                HAZIRLA
                            </button>
                            <div id="popup" class="fixed inset-0 bg-gray-800 bg-opacity-50 justify-center items-center hidden p-20 border">
                                <div class="bg-white p-8 rounded-lg shadow-lg overflow-y-auto height">
                                    <div class="flex max-md:flex-wrap items-center lg:items-start">
                                        <div class="md:w-1/2 pizza mb-8 lg:mb-0" id="pizza">
                                          <!--    <img src="images/hamtab.png" class="relative w-300 h-300 m-auto" alt="">
                                           Malzemeler buraya eklenecek -->
                                        </div>
                                        <div class="md:w-1/2 ml-0 lg:ml-8">
                                            <h2 class="font-bold text-red-500 mb-4">Ürünler</h2>
                                            <div class="space-y-4">
                                                <form id="pizzaForm" action="{{ route('sepet.pizzaekle') }}" method="POST">
                                                    @csrf
                                                    @foreach ($uruns as $urun)
                                                    <label class="flex items-center">
                                                        <input type="checkbox" class="form-checkbox mr-2" value="{{ $urun->id }}" data-ingredient="{{$urun->name}}" data-src="{{asset($urun->image)}}"> {{ $urun->name }}
                                                        <span class="text-lg ml-4" name="price">{{$urun->price}}₺</span>
                                                    </label>
                                                    @endforeach

                                                    <input type="hidden" name="urun_id[]" id="selectedProductsInput">
                                                    <label for="pizza_name" class="text-lg">Pizza Adı:</label>
                                                    <input type="text" name="pizza_name" id="pizza_name" class="text-lg" required>
                                                    <button type="submit" class="text-lg">Pizzayı Oluştur</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Kapatma düğmesi -->
                                    <button id="closePopupButton"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-3 content-start w-full">
        <img src="images/alt.png" alt="">
        <img src="images/alt1.png" alt="">
        <img src="images/alt.png" alt="">
    </div>
</div>


<!--Yanında iyi gider-->
<div class="container mx-auto p-4">
    <div class="text-gray-600 body-font overflow-hidden">
        <div class="px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <div class="md:w-1/2 lg:pr-10 lg:py-6 mb-6 lg:mb-0 max-md:w-full">

                    <!-- Radio Butonlar -->
                    <div class="flex space-x-2 mb-4 flex-wrap gap-2">
                        <input type="radio" id="icecekler" name="kategori" value="icecekler" class="hidden" checked>
                        <label for="icecekler" class="py-2 px-3 cursor-pointer rounded-full bg-white border border-red-800 text-lg max-md:text-sm p-5"><span class="max-md:hidden">İçecek</span>
                            <span class="hidden max-md:inline-block">
                                <img src="images/icecek.png" alt="icecek" class="h-8 w-8">
                            </span>
                        </label>

                        <input type="radio" id="atistirmaliklar" name="kategori" value="atistirmaliklar" class="hidden">
                        <label for="atistirmaliklar" class="py-2 px-3 cursor-pointer rounded-full bg-white border border-red-800 text-lg max-md:text-sm p-5"><span class="max-md:hidden">Atıştırmalık</span>
                            <span class="hidden max-md:inline-block">
                                <img src="images/atistirmalik.png" alt="atistirmalik" class="h-8 w-8">
                            </span>
                        </label>

                        <input type="radio" id="soslar" name="kategori" value="soslar" class="hidden">
                        <label for="soslar" class="py-2 px-3 cursor-pointer rounded-full bg-white border border-red-800 text-lg max-md:text-sm p-5"><span class="max-md:hidden">Sos</span>
                            <span class="hidden max-md:inline-block">
                                <img src="images/sos.png" alt="sos" class="h-8 w-8">
                            </span>
                        </label>

                        <input type="radio" id="tatlilar" name="kategori" value="tatlilar" class="hidden">
                        <label for="tatlilar" class="py-2 px-3 cursor-pointer rounded-full bg-white border border-red-800 text-lg max-md:text-sm p-5"><span class="max-md:hidden">Tatlı</span>
                            <span class="hidden max-md:inline-block">
                                <img src="images/tatli.png" alt="tatli" class="h-8 w-8">
                            </span>
                        </label>
                    </div>

                    <!-- icecekler -->
                    <div id="icecekler-content" class="kategori-content overflow-y-auto max-h-96 max-lg:h-80">
                        <h2 class="text-xl font-semibold mb-2">İçecekler</h2>
                        <div class="grid grid-cols-1 gap-4">
                            <!-- İçecekler Listesi -->
                            @if (!empty($iceceks) && $iceceks->count() > 0)
                                 @foreach ($iceceks as $icecek)
                                <form action="{{route('sepet.icecekekle')}}" method="POST">
                                    @csrf
                                    <div>
                                        <label class="bg-white border border-gray-300 p-2 flex justify-around rounded-lg cursor-pointer items-center">
                                            <span class="text-lg font-semibold">{{$icecek->name}}</span>
                                            <img src="{{asset($icecek->image)}}" alt="" class="w-8 h-24 object-cover mt-2">
                                            <span class="text-gray-700">{{$icecek->price}}₺</span>
                                            <div class="bg-[#F9AC0C] p-3 rounded">
                                                <div class="flex items-center mb-4">
                                                    <label for="quantity-{{$icecek->id}}" class="mr-2"></label>
                                                    <input type="number" id="quantity-{{$icecek->id}}" name="quantity" value="1" min="1" max="10" class="border rounded-md px-3 py-1 w-16">
                                                </div>
                                                <input type="hidden" name="icecek_id" value="{{$icecek->id}}">
                                                <input type="hidden" name="name" value="{{$icecek->name}}">
                                                <input type="hidden" name="price" value="{{$icecek->price}}">
                                                <input type="hidden" name="size" value="{{$icecek->size}}">
                                                <button type="submit" class="button text-white text-lg font-semibold px-4 py-2 rounded mt-4">✓</button>
                                            </div>
                                        </label>
                                    </div>
                                </form>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- atistirmaliklar-->
                    <div id="atistirmaliklar-content" class="kategori-content hidden overflow-y-auto max-h-96  max-lg:h-80">
                        <h2 class="text-xl font-semibold mb-2">Atıştırmalıklar</h2>
                        <div class="grid grid-cols-1 gap-4">
                            @if (!empty($atistirmaliks) && $atistirmaliks->count() > 0)
                                @foreach ($atistirmaliks as $atistirmalik)
                                <form action="{{route('sepet.atistirmalikekle')}}" method="POST">
                                    @csrf
                                    <div>
                                        <label class="bg-white border border-gray-300 p-2 flex justify-around rounded-lg cursor-pointer items-center">
                                            <span class="text-lg font-semibold">{{$atistirmalik->name}}</span>
                                            <img src="{{asset($atistirmalik->image)}}" alt="" class="w-16 h-16 object-cover mt-2">
                                            <span class="text-gray-700">{{$atistirmalik->price}}₺</span>
                                            <div class="bg-[#F9AC0C] p-3 rounded">
                                                <div class="flex items-center mb-4">
                                                    <label for="quantity-{{$atistirmalik->id}}" class="mr-2"></label>
                                                    <input type="number" id="quantity-{{$atistirmalik->id}}" name="quantity" value="1" min="1" max="10" class="border rounded-md px-3 py-1 w-16">
                                                </div>
                                                <input type="hidden" name="atistirmalik_id" value="{{$atistirmalik->id}}">
                                                <input type="hidden" name="name" value="{{$atistirmalik->name}}">
                                                <input type="hidden" name="price" value="{{$atistirmalik->price}}">
                                                <input type="hidden" name="size" value="{{$atistirmalik->size}}">
                                                <button type="submit" class="button text-white text-lg font-semibold px-4 py-2 rounded mt-4">✓</button>
                                            </div>
                                        </label>
                                    </div>
                                </form>
                                @endforeach
                            @endif
                        </div>

                    </div>

                    <!-- soslar-->
                    <div id="soslar-content" class="kategori-content hidden overflow-y-auto max-h-96  max-lg:h-80">
                        <h2 class="text-xl font-semibold mb-2">Soslar</h2>
                        <div class="grid grid-cols-1 gap-4">
                            @if (!empty($soss) && $soss->count() > 0)
                            @foreach ($soss as $sos)
                            <form action="{{route('sepet.sosekle')}}" method="POST">
                                @csrf
                                <div>
                                    <label class="bg-white border border-gray-300 p-2 flex justify-around rounded-lg cursor-pointer items-center">
                                        <span class="text-lg font-semibold">{{$sos->name}}</span>
                                        <img src="{{asset($sos->image)}}" alt="" class="w-16 h-16 object-cover mt-2">
                                        <span class="text-gray-700">{{$sos->price}}₺</span>
                                        <div class="bg-[#F9AC0C] p-3 rounded">
                                            <div class="flex items-center mb-4">
                                                <label for="quantity-{{$sos->id}}" class="mr-2"></label>
                                                <input type="number" id="quantity-{{$sos->id}}" name="quantity" value="1" min="1" max="10" class="border rounded-md px-3 py-1 w-16">
                                            </div>
                                            <input type="hidden" name="sos_id" value="{{$sos->id}}">
                                            <input type="hidden" name="name" value="{{$sos->name}}">
                                            <input type="hidden" name="price" value="{{$sos->price}}">
                                            <input type="hidden" name="size" value="{{$sos->size}}">
                                            <input type="hidden" name="size" value="{{$sos->size}}">
                                            <button type="submit" class="button text-white text-lg font-semibold px-4 py-2 rounded mt-4">✓</button>
                                        </div>
                                    </label>
                                </div>
                            </form>
                            @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- tatlilar-->
                    <div id="tatlilar-content" class="kategori-content hidden overflow-y-auto max-h-96  max-lg:h-80">
                        <h2 class="text-xl font-semibold mb-2">Tatlılar</h2>
                        <div class="grid grid-cols-1 gap-4">
                            @if (!empty($tatlis) && $tatlis->count() > 0)
                            @foreach ($tatlis as $tatli)
                            <form action="{{route('sepet.tatliekle')}}" method="POST">
                                @csrf
                                <div>
                                    <label class="bg-white border border-gray-300 p-2 flex justify-around rounded-lg cursor-pointer items-center">
                                        <span class="text-lg font-semibold">{{$tatli->name}}</span>
                                        <img src="{{asset($tatli->image)}}" alt="" class="w-16 h-16 object-cover mt-2">
                                        <span class="text-gray-700">{{$tatli->price}}₺</span>
                                        <div class="bg-[#F9AC0C] p-3 rounded">
                                            <div class="flex items-center mb-4">
                                                <label for="quantity-{{$tatli->id}}" class="mr-2"></label>
                                                <input type="number" id="quantity-{{$tatli->id}}" name="quantity" value="1" min="1" max="10" class="border rounded-md px-3 py-1 w-16">
                                            </div>
                                            <input type="hidden" name="tatli_id" value="{{$tatli->id}}">
                                            <input type="hidden" name="name" value="{{$tatli->name}}">
                                            <input type="hidden" name="price" value="{{$tatli->price}}">
                                            <input type="hidden" name="size" value="{{$tatli->size}}">
                                            <input type="hidden" name="size" value="{{$tatli->size}}">
                                            <button type="submit" class="button text-white text-lg font-semibold px-4 py-2 rounded mt-4">✓</button>
                                        </div>
                                    </label>
                                </div>
                            </form>
                            @endforeach
                            @endif
                        </div>
                    </div>

                </div>
                <div class="md:w-1/2 flex justify-around items-center py-24 max-md:py-14 w-full">
                    <img alt="ecommerce" class="w-full max-md:h-80 max-sm:h-72 max-sm:w-72" src="images/kutu.png">
                </div>
            </div>
        </div>
    </div>
</div>

<!--Müşteri Memnuniyet-->
<div class="grid grid-cols-3 content-start w-full">
    <img src="images/dalga.png" alt="">
    <img src="images/dalga.png" alt="">
    <img src="images/dalga.png" alt="">
</div>
<div class="container mx-auto p-4">
    <div class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <div class="md:w-1/2 flex py-10 max-md:py-14 w-full">
                    <img alt="" class="w-full max-md:h-70" src="images/musteri.png">
                </div>
                <div class="md:w-1/2 lg:pr-10 lg:py-6 mb-6 lg:mb-0 max-md:w-full flex flex-col justify-center items-center">
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">Müşteri Memnuniyeti</h1>
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                </path>
                            </svg>
                            <span class="text-gray-600 ml-3">4 Reviews</span>
                        </span>
                        <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                </svg>
                            </a>
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                    </path>
                                </svg>
                            </a>
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                    </path>
                                </svg>
                            </a>
                        </span>
                    </div>
                    <div class="flex">
                        <button class="flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                        <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="grid grid-cols-3 content-start w-full">
    <img src="images/dalga.png" alt="">
    <img src="images/dalga.png" alt="">
    <img src="images/dalga.png" alt="">
</div>

<!--İletişim-->
<div class="container mx-auto p-4">
    <div class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <div class="md:w-1/2 lg:pr-10 lg:py-6 mb-6 lg:mb-0 max-md:w-full">
                    <div>
                        <div class="container mx-auto flex">
                            <div id="contact-form" class="relative mb-4">
                                <div class="lg:w-full mb-10  rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative">
                                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Bizimle İletişime Geç
                                    </h2>
                                    @if(session()->has('message'))
                                    <div class="fixed top-0 left-0 w-full bg-green-500 text-white text-center py-3 z-50 mt-3">
                                        {{ session()->get('message') }}
                                    </div>
                                    @endif
                                    <form action="{{route('iletisimkaydet')}}" method="post">
                                        @csrf
                                        <div class="relative mb-4">
                                            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                                            <input type="email" id="email" name="email" required class="w-full bg-white rounded border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                        <div class="relative mb-4">
                                            <label for="message" class="leading-7 text-sm text-gray-600">Mesaj</label>
                                            <textarea id="message" name="message" required class="w-full bg-white rounded border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                        </div>
                                        <button class="text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg">Gönder</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0 p-8">
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADRES</h2>
                        <p class="mt-1">AMASYA</p>
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                        <a class="text-purple-500 leading-relaxed">example@email.com</a>
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">TELEFON</h2>
                        <p class="leading-relaxed">123-456-7890</p>
                    </div>
                </div>
                <div class="md:w-1/2 flex py-24 max-md:py-14 w-full">
                    <img alt="" class="w-full max-md:h-80" src="images/iletisim.png">
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function openModal(pizzaId) {
        const pizzaImage = document.querySelector(`img[data-id="${pizzaId}"]`);
        const name = pizzaImage.getAttribute('data-name');
        const description = pizzaImage.getAttribute('data-description');
        const pricesmall = pizzaImage.getAttribute('data-price-small');
        const priceMedium = pizzaImage.getAttribute('data-price-medium');
        const priceLarge = pizzaImage.getAttribute('data-price-large');

        document.getElementById('modalPizzaImage').src = pizzaImage.src;
        document.getElementById('modalPizzaName').innerText = name;
        document.getElementById('modalPizzaDescription').innerText = description;
        document.getElementById('pizza-price').innerText = `${pricesmall}₺`;
        document.getElementById('pizzaIdInput').value = pizzaId;

        document.querySelector('#size option[value="small"]').setAttribute('data-price', pricesmall);
        document.querySelector('#size option[value="medium"]').setAttribute('data-price', priceMedium);
        document.querySelector('#size option[value="large"]').setAttribute('data-price', priceLarge);

        document.getElementById('pizzaModal').classList.remove('hidden');
        document.getElementById('blurBackground').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('pizzaModal').classList.add('hidden');
        document.getElementById('blurBackground').classList.add('hidden');
    }

    function updatePrice() {
        const sizeSelect = document.getElementById('size');
        const selectedOption = sizeSelect.options[sizeSelect.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        document.getElementById('pizza-price').innerText = `${price}₺`;
    }

    //özelleştirme
    // Checkboxları seç

</script>
@endsection
