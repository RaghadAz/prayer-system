@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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


        @include('student.top-three')
        {{-- <div class="dashboard-box">
            <h4>🏆 أفضل 3 طالبات</h4>

            <table class="table">
                <thead>
                    <tr>
                        <th>اسم الطالبة</th>
                        <th>مجموع النقاط</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($topThree as $student)
                        <tr>
                            <td>{{ $student->user->name ?? 'مستخدم غير متوفر' }}</td>
                            <td>{{ $student->total_points }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted py-3">
                                لا توجد نقاط أو إنجازات مسجلة حتى الآن.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div> --}}

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-btn w-100 text-white">تسجيل خروج</button>
        </form>

    </div>
@endsection
