@extends('layouts.snavbar')
@extends('layouts.app')

@section('content')
    @include('layouts.snavbar')

    <div class="row mt-4" dir="rtl">
        @foreach ($teachersTopStudents ?? [] as $teacher)
            @php
                $topList = collect(data_get($teacher, 'topStudents', []));
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
                        <ol class="list-group list-group-numbered">
                            @foreach ($topList as $student)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ data_get($student, 'user.name', '—') }}</span>
                                    <span class="badge bg-primary rounded-pill">
                                        {{ data_get($student, 'total_points', 0) }} نقطة
                                    </span>
                                </li>
                            @endforeach
                        </ol>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
