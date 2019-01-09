<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


            a.index-login-button {
                color: #3e3935;
                text-decoration: none !important;
                font-weight: bold;
                font-size: 53px;
                border-radius: 3px;
                background: white;
                border: 2px solid #905a27;
                padding: 10px 210px;

                -webkit-transition: background-color 0.7s ease-out;
                -moz-transition: background-color 0.7s ease-out;
                -o-transition: background-color 0.7s ease-out;
                transition: background-color 0.7s ease-out;

                -webkit-transition: color 0.7s ease-out;
                -moz-transition: color 0.7s ease-out;
                -o-transition: color 0.7s ease-out;
                transition: color 0.7s ease-out;

            }

            a.index-login-button:hover{
                color: #fff;
                border: 2px solid #3e3935;
                background: #3e3935;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <img src="https://curtisshotel.com/wp-content/uploads/2016/11/curtiss-hotel-buffalo-ny-logo-800w.png" alt="">
                </div>

                <a href="{{ route('login') }}" class="index-login-button">Login</a>

            </div>
        </div>
    </body>
</html>
