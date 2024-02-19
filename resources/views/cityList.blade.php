<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City List</title>
    @vite(['resources/css/nav.css', 'resources/js/nav.js'])
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">
    <style>
        body {
            margin: 0;
            transition: all 0.5s ease;
        }

        .menu {
            position: fixed;
            top: 50%;
            right: 0;
            /* background: none; */
            list-style: none;
            padding: 20px;
            z-index: 999;
            transform: translateY(-50%);

        }

        .menu ul {
            padding: 0;
            list-style-type: none;
            color: white;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }


        .menu li {
            margin-bottom: 10px;
            cursor: pointer;

        }


        .cityContentContainer .cityContent {
            width: 100%;
            height: 100vh;
            background-position: center top;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;

        }

        .cityContent h1 {
            font-size: 60px;
            color: white;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }

        .cityContent p {
            font-size: 18px;
            padding: 0 500px;
            color: white;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }

        .menu ul li {
            font-size: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: bold;

        }

        .menu ul li:hover {
            background-color: #007bff;
            color: white;
        }

        .city-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .city-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @include('navbar')


    <div class="menu">
        <ul>
            @foreach ($cities as $city)
                <li data-target="{{ $city->city_name }}">{{ $city->city_name }}</li>
            @endforeach
        </ul>
    </div>

    <div class="cityContentContainer">
        @foreach ($cities as $city)
            <div class="cityContent" id="{{ $city->city_name }}" data-city-name="{{ $city->city_id }}"
                style="background-image: url('{{ Storage::url($city->city_img) }}');">
                <h1>{{ $city->city_name }}</h1>
                <p>{{ $city->city_description }}</p>
                {{-- <button id="button-{{ $city->city_name }}" class="city-button">ดูข้อมูลเพิ่มเติม</button> --}}
            </div>
        @endforeach
    </div>

    @include('footer')

    <script>
        document.querySelectorAll('.menu li').forEach(item => {
            item.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const cityId = urlParams.get('city_id');

            if (cityId) {
                const targetElement = document.querySelector(`[data-city-name="${cityId}"]`);

                if (targetElement) {
                    const offsetTop = targetElement.offsetTop;
                    const scrollDuration = 500; // ความยาวเวลาในการเลื่อน (มิลลิวินาที)

                    console.log(`Selected City ID: ${cityId}`);
                    scrollToTarget(offsetTop, scrollDuration);
                }
            }
        });

        function easeInOutQuad(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        function scrollToTarget(offset, duration) {
            const startingY = window.pageYOffset;
            const diff = offset - startingY;
            let start;

            window.requestAnimationFrame(function step(timestamp) {
                if (!start) start = timestamp;

                const time = timestamp - start;
                const percent = Math.min(time / duration, 1);
                const easedOffset = easeInOutQuad(time, startingY, diff, duration);

                window.scrollTo(0, easedOffset);

                if (time < duration) {
                    window.requestAnimationFrame(step);
                }
            });
        }
    </script>


</body>

</html>
