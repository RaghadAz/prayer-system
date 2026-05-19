@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="text-center mb-4">📘 لوحة الطالب — {{ $student->user->name }}</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow p-3 text-center">
                <h5>نقاط اليوم</h5>
                <h3 class="text-primary">{{ $todayPoints }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3 text-center">
                <h5>نقاط الأسبوع</h5>
                <h3 class="text-success">{{ $weekPoints }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3 text-center">
                <h5>نقاط الشهر</h5>
                <h3 class="text-warning">{{ $monthPoints }}</h3>
            </div>
        </div>

    </div>

    <div class="card shadow p-4 mt-4">
        <h4 class="mb-3">📊 ترتيبك بين الطالبات</h4>
        <h3 class="text-center">{{ $ranking }}</h3>
    </div>

    <div class="card shadow p-4 mt-4">
        <h4 class="mb-3">🏆 أفضل 3 طالبات</h4>

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
        <button class="btn btn-danger w-100">تسجيل خروج</button>
    </form>

</div>
@endsection
