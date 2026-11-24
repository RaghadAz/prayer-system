@extends('layouts.snavbar')

<div class="row mt-4" dir="rtl">
    @foreach ($teachersTopStudents ?? [] as $teacher)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3 h-100">
                <h5 class="mb-3">
                    ا. {{ $teacher->user?->name ?? '—' }}
                </h5>

                @if ($teacher->topStudents->isEmpty())
                    <p class="text-muted mb-0">لا توجد نقاط مسجلة للطالبات هذا الشهر.</p>
                @else
                    <ol class="list-group list-group-numbered">
                        @foreach ($teacher->topStudents as $student)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $student->user?->name ?? '—' }}</span>
                                <span class="badge bg-primary rounded-pill">
                                    {{ $student->total_points }} نقطة
                                </span>
                            </li>
                        @endforeach
                    </ol>
                @endif
            </div>
        </div>
    @endforeach
</div>
