@extends('layouts.app')

@section('content')<link rel="stylesheet" href="{{ asset('style.css') }}">

<div class="container mt-4">

    <h2 class="dashboard-title text-center">📘 لوحة الطالب — {{ $student->user->name }}</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="dashboard-card">
                <h5>نقاط اليوم</h5>
                <h3>{{ $todayPoints }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card">
                <h5>نقاط الأسبوع</h5>
                <h3>{{ $weekPoints }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card">
                <h5>نقاط الشهر</h5>
                <h3>{{ $monthPoints }}</h3>
            </div>
        </div>

    </div>

    <div class="dashboard-box">
        <h4>📊 ترتيبك بين الطالبات</h4>
        <h3 class="text-center">{{ $ranking }}</h3>
    </div>

    <div class="dashboard-box">
        <h4>🏆 أفضل 3 طالبات</h4>

        <table class="table table-bordered text-center">
            <tr>
                <th>الاسم</th>
                <th>النقاط</th>
            </tr>

            @foreach($topThree as $student)
            <tr>
                <td>{{ $student->user->name }}</td>
                <td>{{ $student->total_points }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-btn w-100 text-white">تسجيل خروج</button>
    </form>

</div>
@endsection
