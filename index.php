<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POS System</title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <!-- Styles -->
    <style>
        html,
        body {

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

        .links>a {
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
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">

        <div class="content">

            <div class="text-center ">

                <img src="favicon.png" style="width: 25%;;" alt="" srcset="">

            </div>

            <div class="title m-b-md">

                POS Management System

            </div>

            <div class="links">
                <!-- For more projects: Visit NetGO+  -->
                <a href="pos/admin/">Admin Log In</a>
                <a href="pos/cashier/">Cashier Log In</a>

            </div>
            <div class="text-right">
                <img src="infini.png" style="width: 30%;;" alt="" srcset="">
            </div>

        </div>


    </div>
</body>

</html>