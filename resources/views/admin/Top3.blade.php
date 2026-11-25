@extends('layouts.snavbar')
@extends('layouts.app')

@section('content')
    @include('layouts.snavbar')

    <div class="container mt-4" dir="rtl">
        <div class="row">
            @foreach ($teachersTopStudents ?? [] as $teacher)
                @php
                    $topList = collect(data_get($teacher, 'topStudents', []))->take(5);
                    $teacherName = data_get($teacher, 'user.name', '—');
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
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ data_get($student, 'user.name', '—') }}</td>
                                                <td>
                                                    <span class="badge bg-primary rounded-pill">
                                                        {{ data_get($student, 'total_points', 0) }} نقطة
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
