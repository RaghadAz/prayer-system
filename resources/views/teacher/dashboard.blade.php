@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="text-center mb-4">لوحة تحكم الأنسة</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow p-3 text-center">
                <h4>👧 عدد الطالبات</h4>
                <h2>{{ $studentsCount }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3 text-center">
                <h4>⭐ نقاط اليوم</h4>
                <h2>{{ $todayPoints }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3 text-center">
                <h4>📅 نقاط الأسبوع</h4>
                <h2>{{ $weeklyPoints }}</h2>
            </div>
        </div>

    </div>

    <hr class="my-4">

    <h4 class="mb-3">🏆 أفضل 3 طالبات</h4>

    <ul class="list-group mb-4">
        @foreach($topStudents as $student)
            <li class="list-group-item d-flex justify-content-between">
                <strong>{{ $student->user->name ?? '—' }}
</strong>
                <span>{{ $student->total_points ?? 0 }} نقطة</span>
            </li>
        @endforeach
    </ul>

  <a href="{{ route('teacher.students') }}" class="btn btn-primary w-100 mb-3">عرض الطالبات</a>

{{-- <a href="{{ route('teacher.daily.points') }}" class="btn btn-info w-100 mb-2">📊 نقاط اليوم</a> --}}

{{-- <a href="{{ route('teacher.reports.weekly') }}" class="btn btn-secondary w-100 mb-2">📅 تقرير الأسبوع</a> --}}

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger w-100">تسجيل خروج</button>
    </form>

</div>
@endsection
