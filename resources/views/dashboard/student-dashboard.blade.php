@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">لوحة التحكم - الطالبة</h2>

    <div class="row">

        <div class="col-md-3">
            <div class="card shadow-sm p-3 mb-4">
                <h6 class="text-center">نقاط اليوم</h6>
                <h2 class="text-center text-primary">{{ $todayPoints }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm p-3 mb-4">
                <h6 class="text-center">نقاط الأسبوع</h6>
                <h2 class="text-center text-success">{{ $weeklyPoints }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm p-3 mb-4">
                <h6 class="text-center">نقاط الشهر</h6>
                <h2 class="text-center text-warning">{{ $monthlyPoints }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm p-3 mb-4">
                <h6 class="text-center">مجموع النقاط</h6>
                <h2 class="text-center text-info">{{ $totalPoints }}</h2>
            </div>
        </div>

    </div>

    <div class="card shadow-sm p-3 mb-4">
        <h5 class="text-center">هل صلّيتِ اليوم؟</h5>
        <h4 class="text-center">
            @if($prayedToday)
                <span class="text-success">✔ نعم</span>
            @else
                <span class="text-danger">✘ لا</span>
            @endif
        </h4>
    </div>

    <h4 class="mt-4">آخر سجلات الصلاة</h4>
    <ul class="list-group">
        @foreach($recentRecords as $record)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $record->prayer_name }}</span>
                <span>{{ $record->status }}</span>
                <span>{{ $record->points }} نقطة</span>
            </li>
        @endforeach
    </ul>

</div>
@endsection
