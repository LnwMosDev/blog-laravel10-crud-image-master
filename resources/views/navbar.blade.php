<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('img/logo5.png') }}" alt="mon"></a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="{{ url('/') }}">หน้าหลัก</a></li>
                    <li><a href="{{ url('/genshinList') }}">ตัวละคร</a></li>
                    <li><a href="{{ url('/cityList') }}">บันทึกเบิกทาง</a></li>
                    <li><a href="{{ url('/dashboard') }}">Admin</a></li>
                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/scripts.js"></script>
<!-- Function used to shrink nav bar removing paddings and adding black background -->
<script>
    $(document).ready(function() {
        $('.navTrigger').click(function() {
            $(this).toggleClass('active'); // Toggle the 'active' class on the clicked element.
            $("#mainListDiv").toggleClass(
                "show_list"); // Toggle the 'show_list' class on the element with ID 'mainListDiv.'
            $("#mainListDiv").fadeIn(); // Fade in the element with ID 'mainListDiv.'
        });
    });

    // Function used to shrink nav bar by adding 'affix' class
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $('.nav').addClass('affix');
            console.log("OK");
        } else {
            $('.nav').removeClass('affix');
        }
    });
</script>

</html>
