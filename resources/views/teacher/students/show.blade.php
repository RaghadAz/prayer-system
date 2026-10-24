@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="student-page">

        <div class="student-header">
            <h2>تقرير الطالبة: {{ $student->user->name }}</h2>
        </div>

        <div class="section-box">
            <h3>تقرير اليوم</h3>

            @php
                // تحويل سجلات اليوم إلى مصفوفة مفتاحها question_id لسهولة البحث السريع
                $dailyAssoc = $daily->keyBy('question_id');
            @endphp

            @if ($daily->count() == 0)
                <p>لا يوجد بيانات لهذا اليوم.</p>
            @else
                <ul>
                    @foreach ($questionNames as $qid => $qName)
                        @if (isset($dailyAssoc[$qid]))
                            @php $rec = $dailyAssoc[$qid]; @endphp
                            <li>
                                {{ $qName }} — {{ $rec->answer_text }}
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
            {{--
            <h3>تقرير الأسبوع</h3>
            <p>عدد الإجابات: {{ $weeklyTotals['total_records'] }}</p>
            <p>مجموع النقاط: {{ $weeklyTotals['total_points'] }}</p> --}}

            {{-- <ul>
                @foreach ($weekly as $rec)
                    <li>
                        {{ $questionNames[$rec->question_id] ?? $rec->question_id }}
                        — {{ $rec->answer_text }}
                        — {{ $rec->points }} نقطة
                    </li>
                @endforeach
            </ul> --}}
        </div>

        <div class="section-box">
            <h3>تقرير الأسبوع (ملخص)</h3>

            @php
                // تحويل الملخص الأسبوعي لمصفوفة مفتاحها question_id
                $weeklyAssoc = collect($weeklySummary)->keyBy('question_id');
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
                        @if (isset($weeklyAssoc[$qid]))
                            @php $item = $weeklyAssoc[$qid]; @endphp
                            <tr>
                                <td>{{ $qName }}</td>
                                <td>{{ $item['answer_text'] }}</td>
                                <td>{{ $item['count'] }}</td>
                                <td>{{ $item['points'] }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
