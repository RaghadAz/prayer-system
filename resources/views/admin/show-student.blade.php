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

      <div class="section-box">
            <h3>تقرير الأسبوع (ملخص)</h3>

            @php
                $weeklyGrouped = collect($weeklySummary)->groupBy('question_id');
            @endphp

            <table class="table">
                <thead>
                    <tr>
                        <th>السؤال</th>
                        <th>الجواب</th>
                        <th>عدد المرات</th>
                        <th>النقاط</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questionNames as $qid => $qName)
                        @if (isset($weeklyGrouped[$qid]))
                            @foreach ($weeklyGrouped[$qid] as $item)
                                <tr>
                                    <td>{{ $qName }}</td>
                                    <td>{{ $item['answer_text'] }}</td>
                                    <td>{{ $item['count'] }}</td>
                                    <td>{{ $item['points'] }}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection
