@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('style.css') }}">

<div class="student-page">

    <div class="student-header">
        <h2>تقرير الطالبة: {{ $student->user->name }}</h2>
    </div>

    <div class="section-box">
        <h3>تقرير اليوم</h3>

        @if($daily->count() == 0)
            <p>لا يوجد بيانات لهذا اليوم.</p>
        @else
            <ul>
                @foreach($daily as $rec)
                    <li>
                        {{ $questionNames[$rec->question_id] ?? $rec->question_id }}
                        — {{ $rec->answer_text }}
                        — {{ $rec->points }} نقطة
                    </li>
                @endforeach
            </ul>
        @endif

        <h3>تقرير الأسبوع</h3>
        <p>عدد الإجابات: {{ $weeklyTotals['total_records'] }}</p>
        <p>مجموع النقاط: {{ $weeklyTotals['total_points'] }}</p>

        <ul>
            @foreach($weekly as $rec)
                <li>
                    {{ $questionNames[$rec->question_id] ?? $rec->question_id }}
                    — {{ $rec->answer_text }}
                    — {{ $rec->points }} نقطة
                </li>
            @endforeach
        </ul>
    </div>

    <div class="section-box">
        <h3>تقرير الأسبوع (ملخص)</h3>

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
                @foreach($weeklySummary as $item)
                <tr>
                    <td>{{ $questionNames[$item['question_id']] ?? $item['question_id'] }}</td>
                    <td>{{ $item['answer_text'] }}</td>
                    <td>{{ $item['count'] }}</td>
                    <td>{{ $item['points'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
