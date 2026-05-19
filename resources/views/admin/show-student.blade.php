@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="text-center mb-4">تفاصيل الطالبة</h2>

    <div class="card shadow p-4">

        <h4>👧 اسم الطالبة: {{ $student->user->name }}</h4>
        <h5 class="mt-2">👩‍🏫 الأنسة:
            {{ $student->teacher ? $student->teacher->user->name : '—' }}
        </h5>

        <hr>

        <h4 class="mb-3">النقاط</h4>

        <ul class="list-group mb-4">
            <li class="list-group-item">
                🔹 نقاط اليوم: <strong>{{ $todayPoints }}</strong>
            </li>
            <li class="list-group-item">
                🔹 نقاط الأسبوع: <strong>{{ $weeklyPoints }}</strong>
            </li>
            <li class="list-group-item">
                🔹 نقاط الشهر: <strong>{{ $monthlyPoints }}</strong>
            </li>
        </ul>

        <hr>

        <h4 class="mb-3">سجل الصلوات</h4>

        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>التاريخ</th>
                    <th>الفجر</th>
                    <th>الظهر</th>
                    <th>العصر</th>
                    <th>المغرب</th>
                    <th>العشاء</th>
                    <th>النقاط</th>
                </tr>
            </thead>

            <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{ $record->date }}</td>
                        <td>{{ $record->fajr }}</td>
                        <td>{{ $record->dhuhr }}</td>
                        <td>{{ $record->asr }}</td>
                        <td>{{ $record->maghrib }}</td>
                        <td>{{ $record->isha }}</td>
                        <td>{{ $record->points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
