<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - جامع الخير</title>

    <!-- خطوط Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tajawal:400,700&display=swap" rel="stylesheet">

    <!-- مكتبة GSAP للرسوم المتحركة -->
    <script defer src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js'></script>

    <!-- الستايل المدمج بألوان البيبي بينك -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            height: 100%;
        }

        body {
            background: linear-gradient(135deg, #fce4ec, #fff0f5);
            position: relative;
            font-size: 16px;
            font-family: 'Tajawal', 'Source Sans Pro', sans-serif;
            font-weight: 400;
            -webkit-font-smoothing: antialiased;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            position: relative;
            display: block;
            width: 100%;
            max-width: 420px;
            background-color: #FFF;
            margin: 20px;
            padding: 2.25em;
            box-sizing: border-box;
            border: solid 1px #f8bbd0;
            border-radius: .75em;
            box-shadow: 0 10px 25px rgba(244, 143, 177, 0.15);
        }

        form .svgContainer {
            position: relative;
            width: 160px;
            height: 160px;
            margin: 0 auto 1.5em;
            border-radius: 50%;
            background: none;
            border: solid 2.5px #d81b60;
            overflow: hidden;
            pointer-events: none;
        }

        form .svgContainer div {
            position: relative;
            width: 100%;
            height: 0;
            overflow: hidden;
            padding-bottom: 100%;
        }

        form .svgContainer .mySVG {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        form .inputGroup {
            margin: 0 0 1.5em;
            padding: 0;
            position: relative;
        }

        form .inputGroup:last-of-type {
            margin-bottom: 0;
        }

        form label {
            margin: 0 0 8px;
            display: block;
            font-size: 1.1em;
            color: #ad1457;
            font-weight: 700;
        }

        form input[type="text"],
        form input[type="password"] {
            display: block;
            margin: 0;
            padding: 0 1em;
            background-color: #fff5f8;
            border: solid 2px #f48fb1;
            border-radius: 8px;
            -webkit-appearance: none;
            box-sizing: border-box;
            width: 100%;
            height: 55px;
            font-size: 1.2em;
            color: #4a148c;
            font-weight: 600;
            font-family: inherit;
            transition: box-shadow .2s linear, border-color .25s ease-out;
            direction: ltr;
            text-align: right;
        }

        form input[type="text"]:focus,
        form input[type="password"]:focus {
            outline: none;
            box-shadow: 0px 2px 12px rgba(244, 143, 177, 0.3);
            border: solid 2px #e91e63;
        }

        form button {
            display: block;
            margin: 0;
            padding: 0;
            background-color: #f48fb1;
            border: none;
            border-radius: 8px;
            box-sizing: border-box;
            box-shadow: none;
            width: 100%;
            height: 55px;
            font-size: 1.3em;
            color: #FFF;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            transition: background-color .2s ease-out;
        }

        form button:hover,
        form button:active {
            background-color: #e91e63;
        }

        @media (max-width: 480px) {
            form {
                padding: 1.5em;
                margin: 10px;
            }
            form .svgContainer {
                width: 130px;
                height: 130px;
            }
        }
    </style>
</head>

<body>

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <!-- صندوق الأفاتار المتحرك -->
        <div class="svgContainer">
            <div>
                <svg class="mySVG" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 200 200">
                    <defs>
                        <circle id="armMaskPath" cx="100" cy="100" r="100"/>
                    </defs>
                    <clipPath id="armMask">
                        <use xlink:href="#armMaskPath" overflow="visible"/>
                    </clipPath>
                    <circle cx="100" cy="100" r="100" fill="#fce4ec"/>
                    <g class="body">
                        <path fill="#FFFFFF" d="M193.3,135.9c-5.8-8.4-15.5-13.9-26.5-13.9H151V72c0-27.6-22.4-50-50-50S51,44.4,51,72v50H32.1 c-10.6,0-20,5.1-25.8,13l0,78h187L193.3,135.9z"/>
                        <path fill="none" stroke="#ad1457" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M193.3,135.9 c-5.8-8.4-15.5-13.9-26.5-13.9H151V72c0-27.6-22.4-50-50-50S51,44.4,51,72v50H32.1c-10.6,0-20,5.1-25.8,13"/>
                        <path fill="#f8bbd0" d="M100,156.4c-22.9,0-43,11.1-54.1,27.7c15.6,10,34.2,15.9,54.1,15.9s38.5-5.8,54.1-15.9 C143,167.5,122.9,156.4,100,156.4z"/>
                    </g>
                    <g class="earL">
                        <g class="outerEar" fill="#f8bbd0" stroke="#ad1457" stroke-width="2.5">
                            <circle cx="47" cy="83" r="11.5"/>
                            <path d="M46.3 78.9c-2.3 0-4.1 1.9-4.1 4.1 0 2.3 1.9 4.1 4.1 4.1" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <g class="earHair">
                            <rect x="51" y="64" fill="#FFFFFF" width="15" height="35"/>
                            <path d="M53.4 62.8C48.5 67.4 45 72.2 42.8 77c3.4-.1 6.8-.1 10.1.1-4 3.7-6.8 7.6-8.2 11.6 2.1 0 4.2 0 6.3.2-2.6 4.1-3.8 8.3-3.7 12.5 1.2-.7 3.4-1.4 5.2-1.9" fill="#fff" stroke="#ad1457" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                    </g>
                    <g class="earR">
                        <g class="outerEar" fill="#f8bbd0" stroke="#ad1457" stroke-width="2.5">
                            <circle cx="155" cy="83" r="11.5"/>
                            <path d="M155.7 78.9c2.3 0 4.1 1.9 4.1 4.1 0 2.3-1.9 4.1-4.1 4.1" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <g class="earHair">
                            <rect x="131" y="64" fill="#FFFFFF" width="20" height="35"/>
                            <path d="M148.6 62.8c4.9 4.6 8.4 9.4 10.6 14.2-3.4-.1-6.8-.1-10.1.1 4 3.7 6.8 7.6 8.2 11.6-2.1 0-4.2 0-6.3.2 2.6 4.1 3.8 8.3 3.7 12.5-1.2-.7-3.4-1.4-5.2-1.9" fill="#fff" stroke="#ad1457" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                    </g>
                    <path class="chin" d="M84.1 121.6c2.7 2.9 6.1 5.4 9.8 7.5l.9-4.5c2.9 2.5 6.3 4.8 10.2 6.5 0-1.9-.1-3.9-.2-5.8 3 1.2 6.2 2 9.7 2.5-.3-2.1-.7-4.1-1.2-6.1" fill="none" stroke="#ad1457" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path class="face" fill="#f8bbd0" d="M134.5,46v35.5c0,21.815-15.446,39.5-34.5,39.5s-34.5-17.685-34.5-39.5V46"/>
                    <path class="hair" fill="#FFFFFF" stroke="#ad1457" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M81.457,27.929 c1.755-4.084,5.51-8.262,11.253-11.77c0.979,2.565,1.883,5.14,2.712,7.723c3.162-4.265,8.626-8.27,16.272-11.235 c-0.737,3.293-1.588,6.573-2.554,9.837c4.857-2.116,11.049-3.64,18.428-4.156c-2.403,3.23-5.021,6.391-7.852,9.474"/>
                    <g class="eyebrow">
                        <path fill="#FFFFFF" d="M138.142,55.064c-4.93,1.259-9.874,2.118-14.787,2.599c-0.336,3.341-0.776,6.689-1.322,10.037 c-4.569-1.465-8.909-3.222-12.996-5.226c-0.98,3.075-2.07,6.137-3.267,9.179c-5.514-3.067-10.559-6.545-15.097-10.329 c-1.806,2.889-3.745,5.73-5.816,8.515c-7.916-4.124-15.053-9.114-21.296-14.738l1.107-11.768h73.475V55.064z"/>
                        <path fill="#FFFFFF" stroke="#ad1457" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M63.56,55.102 c6.243,5.624,13.38,10.614,21.296,14.738c2.071-2.785,4.01-5.626,5.816-8.515c4.53
