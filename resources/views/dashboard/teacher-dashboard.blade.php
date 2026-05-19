@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">لوحة التحكم - الأنسة</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">عدد الطالبات</h5>
                <h2 class="text-center text-primary">{{ $studentsCount }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">نقاط اليوم</h5>
                <h2 class="text-center text-success">{{ $todayPoints }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">نقاط الأسبوع</h5>
                <h2 class="text-center text-warning">{{ $weeklyPoints }}</h2>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">نقاط الشهر</h5>
                <h2 class="text-center text-info">{{ $monthlyPoints }}</h2>
            </div>
        </div>

    </div>

    <h4 class="mt-4">أفضل 3 طالبات</h4>
    <ul class="list-group mb-4">
        @foreach($topStudents as $student)
            <li class="list-group-item d-flex justify-content-between">
                <span>الطالبة رقم {{ $student->student_id }}</span>
                <span>{{ $student->total_points }} نقطة</span>
            </li>
        @endforeach
    </ul>

    <h4 class="mt-4">آخر سجلات الصلاة</h4>
    <ul class="list-group">
        @foreach($recentRecords as $record)
            <li class="list-group-item">
                {{ $record->prayer_name }} - {{ $record->status }} - {{ $record->points }} نقطة
            </li>
        @endforeach
    </ul>

</div>
@endsection
