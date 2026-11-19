{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'جامع الخير')</title>

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="جامع الخير">
    <link rel="apple-touch-icon" href="{{ asset('images/icon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    @stack('styles')

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Cairo', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #FFF0F5;
            color: #4A2535;
            min-height: 100vh;
        }

        .pink-app-bar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 240, 245, 0.92);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1.5px solid #F8BBD0;
            padding: 10px 16px;
            box-shadow: 0 4px 15px rgba(216, 27, 96, 0.08);
        }

        .app-bar-content {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .app-bar-title {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: #880E4F;
            text-align: center;
        }

        .pink-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background-color: #FFFFFF;
            color: #d81b60;
            border: 1.5px solid #F48FB1;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(216, 27, 96, 0.1);
            transition: all 0.2s ease;
        }

        .pink-back-btn:active {
            transform: scale(0.95);
            background-color: #FCE4EC;
        }

        .app-bar-spacer {
            width: 68px;
        }

        .main-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 16px;
        }

        .custom-toast {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background-color: #FFF0F5;
            color: #880E4F;
            border: 2px solid #F48FB1;
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 14.5px;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(216, 27, 96, 0.22);
            display: flex;
            align-items: center;
            gap: 8px;
            opacity: 0;
            transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 99999;
            pointer-events: none;
            white-space: nowrap;
        }

        .custom-toast.show {
            transform: translateX(-50%) translateY(0);
            opacity: 1;
        }
    </style>
</head>

<body>

    @unless (View::hasSection('hide_app_bar'))
        <header class="pink-app-bar">
            <div class="app-bar-content">
                <button type="button" onclick="goBackSmart('@yield('back_url', url('/'))')" class="pink-back-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                    <span>رجوع</span>
                </button>

                <h1 class="app-bar-title">@yield('page_title', 'جامع الخير')</h1>

                <div class="app-bar-spacer"></div>
            </div>
        </header>
    @endunless

    <main class="main-container">
        @yield('content')
    </main>

    <div id="customToast" class="custom-toast">
        <span>🌸</span>
        <span id="customToastText">تم الحفظ بنجاح!</span>
    </div>

    <script>
        function goBackSmart(fallbackUrl) {
            if (window.history.length > 1 && document.referrer !== '') {
                window.history.back();
            } else {
                window.location.href = fallbackUrl;
            }
        }

        window.alert = function(message) {
            const toast = document.getElementById('customToast');
            const text = document.getElementById('customToastText');
            if (toast && text) {
                text.textContent = message || 'تم الحفظ بنجاح';
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 2500);
            }
        };

        (function() {
            var ua = navigator.userAgent || '';
            var isAndroid = /Android/i.test(ua);
            var isWebView = ua.includes('wv') ||
                ua.includes('PrayerSystemApp') ||
                (isAndroid && (!window.chrome || Object.keys(window.chrome).length === 0));

            if (isWebView) {
                var box = document.getElementById('appDownloadBox');
                if (box) box.remove();
            }
        })();
    </script>

    @stack('scripts')
</body>

</html> --}}


 <style>
        * {
            box-sizing: border-box;
            font-family: 'Cairo', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #FFF0F5;
            color: #4A2535;
            min-height: 100vh;
        }

        .pink-app-bar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 240, 245, 0.92);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1.5px solid #F8BBD0;
            padding: 10px 16px;
            box-shadow: 0 4px 15px rgba(216, 27, 96, 0.08);
        }

        .app-bar-content {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .app-bar-title {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: #880E4F;
            text-align: center;
        }

        .pink-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background-color: #FFFFFF;
            color: #d81b60;
            border: 1.5px solid #F48FB1;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(216, 27, 96, 0.1);
            transition: all 0.2s ease;
        }

        .pink-back-btn:active {
            transform: scale(0.95);
            background-color: #FCE4EC;
        }

        .app-bar-spacer {
            width: 68px;
        }

        .main-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 16px;
        }

        .custom-toast {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background-color: #FFF0F5;
            color: #880E4F;
            border: 2px solid #F48FB1;
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 14.5px;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(216, 27, 96, 0.22);
            display: flex;
            align-items: center;
            gap: 8px;
            opacity: 0;
            transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 99999;
            pointer-events: none;
            white-space: nowrap;
        }

        .custom-toast.show {
            transform: translateX(-50%) translateY(0);
            opacity: 1;
        }
    </style>
<nav class="navbar">
    <div class="logo">
        <a href="https://www.facebook.com/share/1ZcLhBXBce/" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('stylingtools/logo.png') }}" alt="Logo">
        </a>
    </div>
                <h1  class="nav-link">@yield('page_title', 'جامع الخير')</h1>

        <header class="pink-app-bar">
            <div class="app-bar-content">
                <a onclick="goBackSmart('/')" class="nav-link">

                    رجوع
                </a>


                <div class="app-bar-spacer"></div>
            </div>
        </header>
</nav>


<script>
    function goBackSmart(fallbackUrl) {
        if (window.history.length > 1 && document.referrer !== '') {
            window.history.back();
        } else {
            window.location.href = fallbackUrl;
        }
    }
</script>
