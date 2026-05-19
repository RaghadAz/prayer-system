
@extends('layouts.app')

@section('content')

<style>
    .student-page {
        max-width: 900px;
        margin: 30px auto;
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        font-family: "Tajawal", sans-serif;
    }

    .student-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .student-header h2 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    .section-box {
        background: #f9f9f9;
        padding: 18px;
        border-radius: 10px;
        margin-bottom: 25px;
        border: 1px solid #eee;
    }

    .section-box h3 {
        font-size: 22px;
        margin-bottom: 15px;
        color: #444;
        border-right: 4px solid #4CAF50;
        padding-right: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    table th, table td {
        padding: 12px;
        border-bottom: 1px solid #eee;
        text-align: center;
    }

    table th {
        background: #4CAF50;
        color: white;
        font-weight: bold;
    }

    table tr:hover {
        background: #f1f1f1;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
    }

    .summary-item {
        background: white;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        border: 1px solid #ddd;
        font-size: 16px;
    }

    .summary-item span {
        display: block;
        font-size: 22px;
        font-weight: bold;
        color: #4CAF50;
    }
</style>

<div class="student-page">

    <div class="student-header">
<h2>تقرير الطالبة: {{ $student->user->name }}</h2>    </div>

    <div class="section-box">
    <h3>تقرير اليوم</h3>
@if($daily->count() == 0)
    <p>لا يوجد بيانات لهذا اليوم.</p>
@else
    <ul>
        @foreach($daily as $rec)
<li>{{ $questionNames[$rec->question_id] ?? $rec->question_id }}
 — {{ $rec->answer_text }} — {{ $rec->points }} نقطة</li>
        @endforeach
    </ul>
@endif

<h3>تقرير الأسبوع</h3>
<p>عدد الإجابات: {{ $weeklyTotals['total_records'] }}</p>
<p>مجموع النقاط: {{ $weeklyTotals['total_points'] }}</p>

<ul>
    @foreach($weekly as $rec)
<li>{{ $questionNames[$rec->question_id] ?? $rec->question_id }}
 — {{ $rec->answer_text }} — {{ $rec->points }} نقطة</li>
    @endforeach
</ul>
    </div>
</div>

    <div class="section-box">
        <h3>تقرير الأسبوع</h3>


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
            <td>{{ $item['question_id'] }}</td>
            <td>{{ $item['answer_text'] }}</td>
            <td>{{ $item['count'] }}</td>
            <td>{{ $item['points'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>

    {{-- <div class="section-box">
       <h3>ملخص الأسبوع</h3>

<table>
    <tr>
        <th>السؤال</th>
        <th>الجواب</th>
        <th>عدد المرات</th>
        <th>النقاط</th>
    </tr>

    @foreach($weeklySummary as $item)
    <tr>
        <td>{{ $item['question_id'] }}</td>
        <td>{{ $item['answer_text'] }}</td>
        <td>{{ $item['count'] }}</td>
        <td>{{ $item['points'] }}</td>
    </tr>
    @endforeach
</table>

    </div> --}}

</div>
@endsection
