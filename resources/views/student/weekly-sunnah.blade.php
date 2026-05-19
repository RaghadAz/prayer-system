@extends('layouts.app')

@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('style.css') }}">
{{--
<div class="navbar">

    <div class="logo">
        <img src="{{ asset('stylingtools/logo.png') }}" alt="">
    </div>

     <div class="options">
        <ul>
            <li><a class="nav-link" href="{{ route('student.home') }}">الصفحة الرئيسية</a></li>
            <li><a class="nav-link" href="{{ route('student.daily.program') }}">البرنامج اليومي</a></li>
            <li><a class="nav-link" href="{{ route('student.weekly.sunnah') }}">إحياء سنة</a></li>

        </ul>
    </div>

</div> --}}

<div class="welcome">
    <br> سنة الأسبوع: السواك
    <br> قال رسول الله صلى الله عليه وسلم: "السواك مطهرة للفم ومرضاة للرب"
</div>

<div class="des1">
    <img src="{{ asset('stylingtools/Pink Flower with Green Leaves.gif') }}" alt="">
</div>

@endsection
