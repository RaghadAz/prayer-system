@extends('layouts.app')

@section('content')

@include('layouts.navbar')
{{-- <div class="navbar">
    <link rel="stylesheet" href="{{ asset('style.css') }}">


    <div class="logo">
        <img src="{{ asset('stylingtools/logo.png') }}" alt="">
    </div>

    <div class="options">
        <ul>
            <li><a class="nav-link" href="{{ route('student.dashboard') }}">الصفحة الرئيسية</a></li>
            <li><a class="nav-link" href="{{ route('student.daily.program') }}">البرنامج اليومي</a></li>
            <li><a class="nav-link" href="{{ route('student.weekly.sunnah') }}">إحياء سنة</a></li>
        </ul>
    </div>

</div> --}}

<div class="welcome">
    <br> {  وقل اعملوا فسيرى الله عملكم }
    <br> أسرة مسجد الخير ترحب بكِ في برنامج انجازاتي
</div>

<div class="des1">
    <img src="{{ asset('stylingtools/Post by @aly-vettoretto · 1 image.gif') }}" alt="">
</div>

@endsection
