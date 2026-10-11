@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
                @forelse($topStudents as $index => $record)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>
                            <strong>#{{ $index + 1 }}</strong>
                            {{ optional($record->user)->name ?? 'طالبة' }}
                        </span>
                        <span class="badge bg-success rounded-pill">
                            {{ $record->total_points ?? 0 }} نقطة
                        </span>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted py-3">
                        لا توجد نقاط مسجلة حتى الآن.
                    </li>
                @endforelse
            </ul>
        </div>

        <a href="{{ route('teacher.students') }}" class="btn-students text-white">عرض الطالبات</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-btn w-100 text-white">تسجيل خروج</button>
        </form>

    </div>
@endsection
