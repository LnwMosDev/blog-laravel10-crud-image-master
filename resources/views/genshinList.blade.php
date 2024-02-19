<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genshin Impact Characters</title>

    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">

    @vite(['resources/css/nav.css', 'resources/js/nav.js'])
    @vite(['resources/css/genshin.css', 'resources/js/genshin.js'])
    @vite(['resources/css/index.css', 'resources/js/genshin.js'])

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </script>
    <style>
        .head h1 {
            font-size: 60px;
            padding: 10px;
            text-align: center;
        }

        .card-img-top {
            max-height: 700px;
            object-fit: cover;
            object-position: top;
        }

        .character-card {
            width: 400px;
            margin: 20px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        #element-filter {
            padding: 10px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            margin-left: 30px;
            width: 100%;
            max-width: 200px;
        }


        #element-filter option {
            background-color: #fff;
            color: #333;
        }

        #element-filter:hover,
        #element-filter:focus {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.25);
            outline: none;
        }

        .row h1,
        h2 {
            font-size: 26px;
        }

        .row h2 {
            font-size: 24px;
        }

        .container1 {
            display: flex;
            max-width: 100%;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>

<body>

    @include('navbar')


    <section class="home4">
        <div class="arrow">
            <img src="{{ asset('img/arrowpng.png') }}" alt="">
        </div>
        <div class="arrow1">
            <img src="{{ asset('img/arrowpng.png') }}" alt="">
        </div>
        <div class="arrow2">
            <img src="{{ asset('img/arrowpng.png') }}" alt="">
        </div>
    </section>

    <div class="head">
        <h1>ตัวละคร</h1>
    </div>

    <select id="element-filter">
        <option value="all">ทั้งหมด</option>
        <option value="Pyro">ไฟ</option>
        <option value="Anemo">ลม</option>
        <option value="Electro">ไฟฟ้า</option>
        <option value="Cryo">น้ำแข็ง</option>
        <option value="Hydro">น้ำ</option>
        <option value="Dendro">ไม้</option>
        <option value="Geo">หิน</option>
    </select>

    <div class="background">
        <div class="container1">

            @foreach ($characters as $character)
                <div class="character-card " data-element="{{ $character->element }}" data-id="{{ $character->id }}"
                    data-img="{{ Storage::url($character->featured_image) }}" data-name="{{ $character->name }}"
                    data-gender="{{ $character->gender }}" data-city="{{ $character->city }}"
                    data-description="{{ $character->description }}">

                    <img src="{{ Storage::url($character->featured_image) }}" alt="{{ $character->name }}"
                        data-id="{{ $character->id }}" class="card-img-top">
                </div>
            @endforeach

        </div>
    </div>

    @include('footer')

    <!-- Modal เพื่อแสดงข้อมูลตัวละคร -->
    <div class="modal fade" id="characterModal" tabindex="-1" aria-labelledby="characterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="characterModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- ข้อมูลตัวละครจะปรากฏที่นี่ -->
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 5,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 2000, // ค่านี้หมายถึงเลื่อนสไลด์ทุก 3 วินาที
            disableOnInteraction: false, // เมื่อผู้ใช้คลิกที่สไลด์, autoplay จะหยุดชั่วคราว
        },
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        // ฟังก์ชันสำหรับการซ่อนและแสดงข้อมูลตัวละคร
        function filterCharacters(selectedElement) {
            // ซ่อนทุกตัวละคร
            $('.character-card').hide();

            // แสดงข้อมูลตัวละครตาม element ที่เลือก
            if (selectedElement === 'all') {
                // หากเลือก 'All Elements' ให้แสดงทุกตัวละครโดยไม่มีช่องว่าง
                $('.character-card').show();
            } else {
                // หากเลือก element ที่ต้องการ ให้แสดงเฉพาะตัวละครที่ตรงกับ element นั้นๆ โดยไม่มีช่องว่าง
                $('.character-card[data-element="' + selectedElement + '"]').show();
            }
        }

        // ตรวจสอบการเปลี่ยนแปลงของ dropdown และทำการกรองข้อมูลตัวละคร
        $('#element-filter').change(function() {
            var selectedElement = $(this).val();
            // เรียกใช้ฟังก์ชัน filterCharacters เพื่อแสดงข้อมูลตัวละครที่ถูกเลือก
            filterCharacters(selectedElement);
        });

        // คำสั่งให้แสดงทุกตัวละครเมื่อโหลดหน้าเว็บครั้งแรก
        filterCharacters('all');
    });
</script>

<!-- สคริปต์ JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // จัดการเมื่อคลิกที่ character cards
        $('.character-card').click(function() {
            // ดึงข้อมูลจาก attribute ของ character card
            var characterId = $(this).find('img').data('id');
            var characterImg = $(this).data('img');
            var characterName = $(this).data('name');
            var characterElement = $(this).data('element');
            var characterGender = $(this).data('gender');
            var characterCity = $(this).data('city');
            var characterDescription = $(this).data('description');

            // กำหนดเนื้อหาใน modal ขึ้นอยู่กับตัวละครที่คลิก
            // $('#characterModalLabel').text('ข้อมูลตัวละคร ID: ' + characterId);
            $('.modal-body').html(`
            <div class="row">
                <div class="col-md-6">
                    <img src="${characterImg}" alt="${characterName}" class="img-fluid" style="max-width: 100%;">
                </div>
                <div class="col-lg-6">
                    <h1><strong>ชื่อ:</strong> ${characterName}</h1>
                    <h2><strong>ธาตุ:</strong> ${characterElement}</h2>
                    <h2><strong>เพศ:</strong> ${characterGender}</h2>
                    <h2><strong>เมือง:</strong> ${characterCity}</h2>
                    <h2><strong>คำอธิบาย:</strong> ${characterDescription}</h2>
                </div>
            </div>
        `);

            // แสดงหน้าต่าง modal
            $('#characterModal').modal('show');
        });
    });
</script>

</html>
