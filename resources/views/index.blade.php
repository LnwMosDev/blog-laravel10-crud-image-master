<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>

    @vite(['resources/css/nav.css', 'resources/js/nav.js'])
    @vite(['resources/css/index.css', 'resources/js/nav.js'])
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">


</head>

<body>
    @include('navbar')

    <div id="video-container">
        <video autoplay muted loop id="video-bg">
            <source src="{{ asset('img/Genshin Impact Dynamic Music - A Day in Mondstadt.mp4') }}" type="video/mp4">
        </video>
        <!-- Add buttons over the video -->
        <div class="heading">
            <h1>เปิดให้บริการอย่างเป็นทางการในหลายแพลตฟอร์มแล้ว ดาวน์โหลดเลย</h1>
        </div>

        <div class="video-buttons">
            <img class="icon1" src="{{ asset('img/qrcode.png') }}" alt="PS5">

            <img class="icon2" src="{{ asset('img/icon ps5.png') }}" alt="PS5"  onclick="openInNewTab('https://www.playstation.com/th-th/games/genshin-impact/')">
            <img class="icon3" src="{{ asset('img/iconWin.png') }}" alt="Windows"  onclick="openInNewTab('https://download-porter.hoyoverse.com/download-porter/2023/09/20/GenshinImpact_install_20230908182428.exe?trace_key=GenshinImpact_install_ua_8432229f4593')">
            <img class="icon4" src="{{ asset('img/iconApp.png') }}" alt="App Store"  onclick="openInNewTab('https://apps.apple.com/us/app/genshin-impact-3rd-anniversary/id1517783697')">
            <img class="icon5" src="{{ asset('img/iconstore.png') }}" alt="Google Play"  onclick="openInNewTab('https://play.google.com/store/apps/details?id=com.miHoYo.GenshinImpact&pli=1')">
            <img class="icon6" src="{{ asset('img/iconepic.png') }}" alt="Epic Games Store"  onclick="openInNewTab('https://store.epicgames.com/th/p/genshin-impact')")">
        </div>


        <div class="arrow">
            <img src="{{ asset('img/arrowpng.png') }}" alt="">
        </div>
        <div class="arrow1">
            <img src="{{ asset('img/arrowpng.png') }}" alt="">
        </div>
        <div class="arrow2">
            <img src="{{ asset('img/arrowpng.png') }}" alt="">
        </div>
    </div>


    <section class="home">
    </section>

    <section class="city">
        @foreach ($cities as $city)
            <div class="capital">
                <a href="{{ url('/cityList') }}?city_id={{ $city->city_id }}">
                    <div class="name">
                        <h1>{{ $city->city_name }}</h1>
                    </div>
                    <img src="{{ Storage::url($city->city_img) }}" alt="{{ $city->city_name }}">
                </a>
            </div>
        @endforeach
    </section>

    </section>

    @include('footer')

    <script>
        function redirectToCity(cityId) {
            window.location.href = "{{ url('/cityList') }}?city_id=" + cityId;
        }
    </script>
    {{-- <div style="height: 1000px">
    </div> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var video = document.getElementById('video-bg');

            // เพิ่ม event listener เมื่อวิดีโอเล่นเสร็จ
            video.addEventListener('ended', function() {
                // หยุดการดาวน์โหลดไฟล์ของวิดีโอ
                video.removeAttribute('preload');
            });
        });

        function openInNewTab(externalUrl) {
    window.open(externalUrl, '_blank');
}

    </script>

</body>

</html>
