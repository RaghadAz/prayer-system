@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('style.css') }}">

<div class="container mt-4">

    <h2 class="dashboard-title text-center">لوحة تحكم الأنسة</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="dashboard-card">
                <h4>👧 عدد الطالبات</h4>
                <h2>{{ $studentsCount }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card">
                <h4>⭐ نقاط اليوم</h4>
                <h2>{{ $todayPoints }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card">
                <h4>📅 نقاط الأسبوع</h4>
                <h2>{{ $weeklyPoints }}</h2>
            </div>
        </div>

    </div>

    <div class="dashboard-box">
        <h4>🏆 أفضل 3 طالبات</h4>

        <ul class="list-group mb-4">
            @foreach($topStudents as $student)
                <li class="list-group-item d-flex justify-content-between">
                    <strong>{{ $student->user->name ?? '—' }}</strong>
                    <span>{{ $student->total_points ?? 0 }} نقطة</span>
                </li>
            @endforeach
        </ul>
    </div>

<a href="{{ route('teacher.students') }}" class="btn-students text-white">عرض الطالبات</a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-btn w-100 text-white">تسجيل خروج</button>
    </form>

</div>
@endsection
