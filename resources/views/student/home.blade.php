@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- <div class="navbar">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">


        <div class="logo">
            <img src="{{ asset('stylingtools/logo.png') }}" alt="">
        </div> --}}

    {{-- <div class="options">
            <ul>
                <li><a class="nav-link" href="{{ route('student.dashboard') }}">الصفحة الرئيسية</a></li>
                <li><a class="nav-link" href="{{ route('student.daily.program') }}">البرنامج اليومي</a></li>
                <li><a class="nav-link" href="{{ route('student.weekly.sunnah') }}">إحياء سنة</a></li>
            </ul>
        </div> --}}

    </div>

    <div class="welcome">
        <br> { وقل اعملوا فسيرى الله عملكم }
        <br> أسرة مسجد الخير ترحب بكِ في برنامج انجازاتي
    </div>

    <div class="des1">
        <img src="{{ asset('stylingtools/Post by @aly-vettoretto · 1 image.gif') }}" alt="">
    </div>

    <div class="welcome">
        <a href="https://github.com/RaghadAz/prayer-system/releases/download/v1.0.0/kh.apk"
            style="display: inline-flex; align-items: center; gap: 8px; background: #FFF0F5; color: #AD1457; border: 1.5px solid #F48FB1; padding: 8px 18px; border-radius: 50px; font-size: 13.5px; font-weight: bold; text-decoration: none;">
            تحميل التطبيق للأندرويد
        </a>
    </div>
@endsection
