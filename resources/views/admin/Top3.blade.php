@extends('layouts.snavbar')
@extends('layouts.app')
@section('content')
    @includeIf('layouts.snavbar')

    <div class="container mt-4" dir="rtl">
        <div class="row">
            @foreach ($teachersTopStudents ?? [] as $teacher)
                @php
                    $topList = collect(
                        data_get($teacher, 'topStudents') ??
                            (data_get($teacher, 'top_students') ?? (data_get($teacher, 'students') ?? [])),
                    )->take(5);

                    $teacherName = data_get($teacher, 'user.name') ?? (data_get($teacher, 'name') ?? '—');
                @endphp

                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm p-3 h-100">
                        <h5 class="mb-3">
                            ا. {{ $teacherName }}
                        </h5>

                        @if ($topList->isEmpty())
                            <p class="text-muted mb-0">لا توجد نقاط مسجلة للطالبات هذا الشهر.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle text-center mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 70px;">الترتيب</th>
                                            <th>اسم الطالبة</th>
                                            <th style="width: 120px;">النقاط</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topList as $index => $student)
                                            @php
                                                $studentName =
                                                    data_get($student, 'user.name') ??
                                                    (data_get($student, 'name') ?? '—');

                                                $points =
                                                    data_get($student, 'total_points') ??
                                                    (data_get($student, 'points') ?? 0);
                                            @endphp
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $studentName }}</td>
                                                <td>
                                                    <span class="badge bg-primary rounded-pill">
                                                        {{ $points }} نقطة
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
