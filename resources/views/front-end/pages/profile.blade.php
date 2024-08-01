@extends('front-end.layout.layout')

@section('content')
<div class="flex justify-center container px-5 mx-auto py-20">
    <div class="flex flex-col w-4/5">

        <!-- Siparişlerim -->
        <section class="profile-section bg-white rounded p-4 mb-4">
            <h2 class="text-lg font-semibold mb-2">Siparişim</h2>
            <div class="flex flex-row flex-wrap justify-center gap-2">
                <!-- Sipariş Kartı -->
                <div class="p-4">
                    <img src="{{ asset('images/onay.png') }}" alt="" class="h-24 ">
                </div>
                <div class="p-4 flex items-center">
                    <img src="{{ asset('images/surec1.png') }}" alt="" class="h-12">
                </div>
                <div class="p-4">
                    <img src="{{ asset('images/hazirlama.png') }}" alt="" class="h-24 w-32">
                </div>
                <div class="p-4 flex items-center">
                    <img src="{{ asset('images/surec.png') }}" alt="" class="h-12">
                </div>
                <div class="p-4">
                    <img src="{{ asset('images/yolda.png') }}" alt="" class="h-32 w-32">
                </div>
                <div class="p-4 flex items-center">
                    <img src="{{ asset('images/surec.png') }}" alt="" class="h-12">
                </div>
                <div class="p-4">
                    <img src="{{ asset('images/teslim.png') }}" alt="" class="h-24">
                </div>
            </div>
        </section>

        @if(Auth::check())
            <section class="profile-section bg-white rounded p-4 mb-4">
                <h2 class="text-lg font-semibold mb-2">Siparişlerim</h2>
                <ul>
                    @if($orders->count() > 0)
                        @foreach($orders as $order)
                            <li>Sipariş #{{ $order->name }} - {{ $order->created_at->translatedFormat('d F Y') }}</li>
                        @endforeach
                    @else
                        <p>Siparişiniz bulunmamaktadır.</p>
                    @endif
                </ul>
            </section>
        @endif


        <!-- Profil Bilgileri Düzenleme -->
        <section class="profile-section bg-white rounded p-4 mb-4">
            <h2 class="text-lg font-semibold mb-2">Profil Bilgileri</h2>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <label for="name" class="block mb-2">Ad:</label>
                <input type="text" id="name" name="name" value="{{ isset($user) ? $user->name : '' }}" class="w-full mb-4 p-2 border rounded">

                <label for="email" class="block mb-2">E-posta:</label>
                <input type="email" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}" class="w-full mb-4 p-2 border rounded">

                <label for="phone" class="block mb-2">Telefon:</label>
                <input type="tel" id="phone" name="phone" value="{{ isset($user) ? $user->phone : '' }}" class="w-full mb-4 p-2 border rounded">

                <label for="address" class="block mb-2">Adres:</label>
                <input type="text" id="address" name="address" value="{{ isset($user) ? $user->address : '' }}" class="w-full mb-4 p-2 border rounded">

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Güncelle</button>
            </form>
        </section>

        <!-- Şifre Değiştirme -->
        <section class="profile-section bg-white rounded p-4 mb-4">
            <h2 class="text-lg font-semibold mb-2">Şifre Değiştirme</h2>
            <form action="{{ route('profile.change.password') }}" method="POST">
                @csrf
                <label for="current-password" class="block mb-2">Mevcut Şifre:</label>
                <input type="password" id="current-password" name="current_password" class="w-full mb-4 p-2 border rounded">

                <label for="new-password" class="block mb-2">Yeni Şifre:</label>
                <input type="password" id="new-password" name="new_password" class="w-full mb-4 p-2 border rounded">

                <label for="confirm-password" class="block mb-2">Yeni Şifre (Tekrar):</label>
                <input type="password" id="confirm-password" name="new_password_confirmation" class="w-full mb-4 p-2 border rounded">

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Şifreyi Değiştir</button>
            </form>
        </section>

    </div>
</div>
@endsection
