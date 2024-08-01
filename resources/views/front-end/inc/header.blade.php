<!--header-->
<header class="bg text-white flex h-[25rem] max-md:h-72 max-sm:h-64">
    <img src="{{ asset('images/main.png') }}" alt="" class="top-0 w-full h-5/6">
    <div class="absolute z-10 top-[5%] left-[5%] h-auto">
        <a href="{{ route('anasayfa') }}"><img src="{{ asset('images/logo.png') }}" alt="logo"
                class="w-40 h-40 max-lg:w-32 max-lg:h-32 max-md:h-24 max-md:w-24 max-sm:h-[17%] max-sm:w-[17%]"></a>
    </div>
    <!-- Sağ taraftaki img -->
    <div class="absolute z-10 right-[10%] top-[5%] flex flex-col items-center gap-2">
        <div class="flex gap-2">
            @if(Auth::check())
                <a href="{{ route('profile') }}">
                    <img class="h-12 w-12 max-md:h-8 max-md:w-8 max-sm:h-6 max-sm:w-6" src="{{ asset('images/profil.png') }}" alt="profil">
                </a>
                <a href="{{ route('sepet') }}">
                    <img class="h-12 w-12 max-md:h-8 max-md:w-8 max-sm:h-6 max-sm:w-6" src="{{ asset('images/sepet.png') }}" alt="sepet">
                </a>
            @endif
        </div>

        <div class="pt-2">
            @guest
                <!-- Kullanıcı giriş yapmamışsa -->
                <a href="{{ route('login') }}">
                    <img class="h-12 w-12 max-md:h-8 max-md:w-8 max-sm:h-6 max-sm:w-6" src="{{ asset('images/giris.png') }}" alt="giris">
                </a>
            @else
                <!-- Kullanıcı giriş yapmışsa -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img class="h-12 w-12 max-md:h-8 max-md:w-8 max-sm:h-6 max-sm:w-6" src="{{ asset('images/cikis.png') }}" class="transition-transform duration-700 transform hover:translate-x-full delay-1000" alt="cikis">
                </a>
            @endguest
        </div>
    </div>

</header>
