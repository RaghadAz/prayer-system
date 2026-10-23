{{-- <div class="navbar">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


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

</div> --}}
<nav class="navbar">
    <div class="logo">
        <a href="https://www.facebook.com/share/1ZcLhBXBce/">
            <img src="{{ asset('stylingtools/logo.png') }}" alt="Logo">
        </a>
    </div>

    <div class="options">
        <ul>
            <li><a class="nav-link" href="{{ route('student.home') }}">الصفحة الرئيسية</a></li>
            <li><a class="nav-link" href="{{ route('student.daily.program') }}">البرنامج اليومي</a></li>
            {{-- <li><a class="nav-link" href="{{ route('student.weekly.sunnah') }}">إحياء سنة</a></li> --}}
            <li><a class="nav-link" href="{{ route('student.dashboard') }}">الإنجاز</a></li>
        </ul>
    </div>
</nav>
