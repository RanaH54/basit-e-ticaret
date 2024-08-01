<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Pizza<402>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/3c8abc8b0f.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Over+the+Rainbow&family=Rubik+Doodle+Shadow&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400..700&family=Londrina+Shadow&display=swap');
        @layer utilities {
        .backdrop-blur {
            backdrop-filter: blur(10px);
        }
        }
        .bg {
            background: #FAEDCD;
            /* opsiyon #fedf97 */
        }

        .button{
            background-color:#0b5405;
        }

        input:checked+label {
            background-color: #F9AC0C;
            /* Arka plan rengi */
            color: #0b5405;
            /* Metin rengi */
            border: none;
        }

        label:active {
            background-color: #F9AC0C;
            /* Arka plan rengi */
            color: #0b5405;
            /* Metin rengi */
            border: none;
        }
        .pizza {
            position: relative;
            width: 300px;
            height: 300px;
            background-image: url('images/hamtab.png'); /* Pizzanın ana resmi */
            background-size: cover;
            margin: auto;
        }
        .ingredient {
            position: absolute;
            width: 300px;
            height: auto;
            margin: auto;
        }

        .height{
           height: 30rem;
        }
    </style>
</head>


<body class="bg">
    <!--Header-->
    @include('front-end.inc.header')

    @yield('content')
     <!--Footer-->
     @include('front-end.inc.footer')

    </body>

    </html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('header.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('header-container').innerHTML = data;
                });


        // Kategori içeriğini göstermek için event dinleyicisi ekleme
        const kategoriler = document.querySelectorAll('input[name="kategori"]');
        const kategoriContent = document.querySelectorAll('.kategori-content');
        kategoriler.forEach((radio, index) => {
            radio.addEventListener('click', () => {
                // Tüm içerik alanlarını gizle
                kategoriContent.forEach(content => {
                    content.classList.add('hidden');
                });

                // Seçilen kategoriye göre ilgili içerik alanını göster
                kategoriContent[index].classList.remove('hidden');
            });
        });
        // Checkboxlar arasındaki peer ilişkisini kurma
        const checkboxlar = document.querySelectorAll('.peer');
        checkboxlar.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                // Seçilen checkboxun durumunu al
                const checked = checkbox.checked;

                // Eğer seçiliyse checkboxa bağlı olan label elementine 'peer-checked' sınıfını ekle
                if (checked) {
                    checkbox.nextElementSibling.classList.add('peer-checked');
                } else {
                    // Eğer seçili değilse 'peer-checked' sınıfını kaldır
                    checkbox.nextElementSibling.classList.remove('peer-checked');
                }
            });
        });
        //kategori-sayac-buton
        $(document).ready(function() {
        $(".increase-btn").click(function() {
            var countSpan = $(this).siblings(".product-count");
            var count = parseInt(countSpan.text());
            count++;
            countSpan.text(count);
        });

        $(".decrease-btn").click(function() {
            var countSpan = $(this).siblings(".product-count");
            var count = parseInt(countSpan.text());
            if (count > 1) {
                count--;
                countSpan.text(count);
            }
        });
    });
    //sepete ekkleme kısmı

        //kategori son

        //Yanında iyi gider
        // Popup'ı açma fonksiyonu
        function openPopup() {
            document.getElementById('popup').classList.remove('hidden');
        }
        // Popup'ı kapatma fonksiyonu
        function closePopup() {
            document.getElementById('popup').classList.add('hidden');
        }
        // Popup'ı açan düğmeye tıklanınca popup'ı göster
        document.getElementById('openPopupButton').addEventListener('click', function () {
            document.getElementById('popup').classList.remove('hidden');
        });

        // Popup'ı kapatan düğmeye tıklanınca popup'ı gizle
        document.getElementById('closePopupButton').addEventListener('click', function () {
            document.getElementById('popup').classList.add('hidden');
        });

        // Popup dışına tıklandığında popup'ı gizle
        document.getElementById('popup').addEventListener('click', function (event) {
            if (event.target === this) {
                document.getElementById('popup').classList.add('hidden');
            }
        });
        //yanında iyi gider son

        //Özelleştirme
        const checkboxes = document.querySelectorAll('.form-checkbox');
        const pizza = document.getElementById('pizza');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const ingredientName = this.dataset.ingredient;
                const imgSrc = this.dataset.src;
                const existingIngredient = document.querySelector(`.ingredient[data-ingredient='${ingredientName}']`);

                if (this.checked) {
                    if (!existingIngredient) {
                        const img = document.createElement('img');
                        img.src = imgSrc;
                        img.classList.add('ingredient');
                        img.setAttribute('data-ingredient', ingredientName);
                        pizza.appendChild(img);
                    }
                } else {
                    if (existingIngredient) {
                        existingIngredient.remove();
                    }
                }
            });
        });
        function adjustIngredientSizes() {
            const ingredients = document.querySelectorAll('.ingredient');
            ingredients.forEach(img => {
                if (window.innerWidth >= 1024) {
                    img.style.maxWidth = '300px';
                } else if (window.innerWidth >= 768) {
                    img.style.maxWidth = '280px';
                } else {
                    img.style.maxWidth = '250px';
                }
            });
        }

        window.addEventListener('resize', adjustIngredientSizes);
        adjustIngredientSizes();

    });
    const checkboxes = document.querySelectorAll('.form-checkbox');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const selectedProducts = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);
            document.querySelector('#selectedProductsInput').value = selectedProducts.join(',');
        });
    });

        //özelleştirme son
         // Footer dosyasını profil sayfasına eklemek için JavaScript
         fetch('footer.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('footer-container').innerHTML = data;
                });
</script>
