<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .footer {
            background: #000;
            padding: 30px 0px;
            font-family: 'Play', sans-serif;
            text-align: center;
        }

        .footer .row1 {
            width: 100%;
            margin: 1% 0%;
            padding: 0.6% 0%;
            color: gray;
            font-size: 0.8em;
        }

        .footer .row1 a {
            text-decoration: none;
            color: gray;
            transition: 0.5s;
        }

        .footer .row1 a:hover {
            color: #fff;
        }

        .footer .row1 ul {
            width: 100%;
        }

        .footer .row1 ul li {
            display: inline-block;
            margin: 0px 30px;
        }

        .footer .row1 a i {
            font-size: 2em;
            margin: 0% 1%;
        }

        @media (max-width:720px) {
            .footer {
                text-align: left;
                padding: 5%;
            }

            .footer .row1 ul li {
                display: block;
                margin: 10px 0px;
                text-align: left;
            }

            .footer .row1 a i {
                margin: 0% 3%;
            }
        }
    </style>
</head>

<body>
    <footer>
        <div class="footer">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('img/logo5.png') }}" alt="mon"></a>
            </div>

            <div class="row1">
                <ul>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Career</a></li>
                </ul>
            </div>

            <div class="row1">
                "PlayStation Family Mark," "PS5 logo" and "PS4 logo" are registered trademarks or trademarks of Sony
                Interactive Entertainment Inc.

                Epic, Epic Games, Epic Games Store, the Epic Games Store logo, and Epic Online Services are trademarks
                and/or registered trademarks of Epic Games. All other trademarks are the property of their respective
                owners.
            </div>
            <div class="row1">
                INFERNO Copyright © 2021 Inferno - All rights reserved || Designed By: Mahesh
            </div>
        </div>
    </footer>
</body>

</html>
