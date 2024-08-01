<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Kullanıcı<402></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/3c8abc8b0f.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Over+the+Rainbow&family=Rubik+Doodle+Shadow&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400..700&family=Londrina+Shadow&display=swap');

        .backdrop-blur {
            backdrop-filter: blur(10px);
        }

        @media (min-width: 1024px) {
            .imgsize {
                height: 45rem;
            }
        }
        @media (max-width: 1024px) {
            .imgsize {
                height: 40rem;
            }
        }
        @media (max-width: 768px) {
            .imgsize {
                height: 30rem;
            }
        }
        @media (max-width: 640px) {
            .imgsize {
                height: 20rem;
            }
        }
        @media (max-width: 425px) {
            .imgsize {
                height: 15rem;
            }
        }

        #loginButton.visible, #registerButton.visible {
            display: block;
        }

        .hidden {
            display: none;
        }

        .bg-opacity-50 {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .bgimage {
            background-image: url('{{ asset('images/arkaplan.png') }}');
            background-repeat: repeat;
            background-size: auto;
        }
    </style>
</head>
<body class="bgimage flex items-center justify-center h-screen">

    <div class="container mx-auto flex items-center">
        <div class="md:w-1/2 flex items-center justify-end lg:mb-0 w-full h-full relative">
            <div class="absolute flex items-center justify-end">
                <img src="{{ asset('images/solin.png') }}" id="image" class="imgsize transition-transform duration-700 transform hover:-translate-x-full delay-1000" alt="">
                <button id="loginButton" class="absolute hidden text-8xl max-md:text-6xl max-sm:text-[12px] text-yellow-500" style="font-family: 'Over the Rainbow', sans-serif;"  onclick="openPopup('loginPopup')">Giriş Yap</button>
            </div>
        </div>

        <div class="md:w-1/2 flex items-center w-full h-full">
            <div class="absolute flex items-center justify-start">
                <img src="{{ asset('images/sagin.png') }}" id="image2" class="imgsize transition-transform duration-700 transform hover:translate-x-full delay-1000" alt="">
                <button id="registerButton" class="absolute hidden text-8xl max-md:text-6xl max-sm:text-[12px] text-yellow-500" style="font-family: 'Over the Rainbow', sans-serif;" onclick="openPopup('registerPopup')">Kayıt Ol</button>
            </div>
        </div>
    </div>

    <div id="loginPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center backdrop-blur">
        <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Giriş Yap</h2>
            <form method="POST" action="{{ route('popup.login') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Şifre</label>
                    <input type="password" name="password" id="password" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <button type="submit" class="w-full py-2 px-4 bg-gradient-to-r from-green-900 from-20% via-red-800 via-30% to-yellow-300 to-90% text-white font-semibold rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-opacity-50">Giriş Yap</button>
            </form>
            <button onclick="closePopup()" class="mt-4 w-full py-2 px-4 bg-gradient-to-r from-yellow-300 from-20% via-red-800 via-30% to-green-900 to-90% text-white font-semibold rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-opacity-50">Kapat</button>
        </div>
    </div>

    <div id="registerPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center backdrop-blur">
        <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Kayıt Ol</h2>
            <form method="POST" action="{{ route('popup.register') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Ad</label>
                    <input type="text" name="name" id="name" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Telefon Numarası</label>
                    <input type="text" name="phone" id="phone" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Adres</label>
                    <input type="text" name="address" id="address" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Şifre</label>
                    <input type="password" name="password" id="password" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Şifreyi Onayla</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <button type="submit" class="w-full py-2 px-4 bg-gradient-to-r from-green-900 from-20% via-red-800 via-30% to-yellow-300 to-90% text-white font-semibold rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-opacity-50">Kayıt Ol</button>
            </form>
            <button onclick="closePopup()" class="mt-4 w-full py-2 px-4 bg-gradient-to-r from-green-900 from-20% via-red-800 via-30% to-yellow-300 to-90% text-white font-semibold rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-opacity-50">Kapat</button>
        </div>
    </div>

    <script>
        function openPopup(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('loginPopup').classList.add('hidden');
            document.getElementById('registerPopup').classList.add('hidden');
        }

        const image = document.getElementById('image');
        const loginButton = document.getElementById('loginButton');
        let timeoutId;

        image.addEventListener('mouseenter', () => {
            loginButton.classList.add('visible');
            clearTimeout(timeoutId);
        });

        image.addEventListener('mouseleave', () => {
            timeoutId = setTimeout(() => {
                loginButton.classList.remove('visible');
            }, 1000);
        });

        const image2 = document.getElementById('image2');
        const registerButton = document.getElementById('registerButton');
        let timeoutId2;

        image2.addEventListener('mouseenter', () => {
            registerButton.classList.add('visible');
            clearTimeout(timeoutId2);
        });

        image2.addEventListener('mouseleave', () => {
            timeoutId2 = setTimeout(() => {
                registerButton.classList.remove('visible');
            }, 1000);
        });
    </script>
</body>
</html>
