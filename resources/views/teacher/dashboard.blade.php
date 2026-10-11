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
                    @if (isset($record->student) && optional($record->student)->user)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>#{{ $index + 1 }} {{ $record->student->user->name ?? 'طالبة' }}</span>
                            <span class="badge bg-success rounded-pill">{{ $record->total_points ?? 0 }} نقطة</span>
                        </div>
                    @endif
                @empty
                    <div class="text-center text-muted py-3">
                        لا توجد نقاط أو إنجازات مسجلة حتى الآن.
                    </div>
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
