<div class="dashboard-box">
    <h3 class="text-center mb-4">🏆 أفضل 3 طالبات هذا الأسبوع</h3>
    <div class="row justify-content-center">
        <ul class="list-group mb-4 w-100">
            @forelse($topThree as $index => $record)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>#{{ $index + 1 }}</strong>
                        {{ optional($record->user)->name ?? 'طالبة' }}
                    </span>
                    <span class="badge rounded-pill px-3 py-2 text-white" style="background-color: #e83e8c;">
                        {{ $record->weekly_points ?? 0 }} نقطة
                    </span>
                </li>
            @empty
                <li class="list-group-item text-center text-muted py-3">
                    لا توجد نقاط مسجلة هذا الأسبوع حتى الآن.
                </li>
            @endforelse
        </ul>
    </div>
</div>
