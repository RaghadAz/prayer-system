<div class="navbar">
    <link rel="stylesheet" href="{{ asset('style.css') }}">


    <div class="logo">
        <img src="{{ asset('stylingtools/logo.png') }}" alt="">
    </div>

    <div class="options">
        <ul>
            <li><a class="nav-link" href="{{ route('student.home') }}">الصفحة الرئيسية</a></li>
            <li><a class="nav-link" href="{{ route('student.daily.program') }}">البرنامج اليومي</a></li>
            <li><a class="nav-link" href="{{ route('student.weekly.sunnah') }}">إحياء سنة</a></li>
            <li><a class="nav-link" href="{{ route('student.dashboard') }}">الإنجاز</a></li>

        </ul>
    </div>

</div>
