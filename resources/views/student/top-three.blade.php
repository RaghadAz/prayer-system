<div class="container mt-4">
    <h3 class="text-center mb-4">أفضل 3 طالبات</h3>

    <div class="row justify-content-center">

         <ul class="list-group mb-4">
                @forelse($topThree as $index => $record)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>
                            <strong>#{{ $index + 1 }}</strong>
                            {{ optional($record->user)->name ?? 'طالبة' }}
                        </span>
                        <span class="badge bg-success rounded-pill">
                            {{ $record->total_points ?? 0 }} نقطة
                        </span>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted py-3">
                        لا توجد نقاط مسجلة حتى الآن.
                    </li>
                @endforelse
            </ul>
        {{-- @forelse($topThree as $index => $student)
            @if(isset($student->user))
                <div class="col-4 text-center">
                    <div style="
                        width:120px;
                        height:120px;
                        border-radius:50%;
                        background:linear-gradient(135deg, #d4af37, #f7e98e);
                        display:flex;
                        flex-direction: column;
                        align-items:center;
                        justify-content:center;
                        margin:auto;
                        font-weight:bold;
                        font-size:16px;
                        color:#000;
                        padding: 10px;
                        text-align: center;">
                        <span>#{{ $index + 1 }}</span>
                        <span>{{ $student->user->name }}</span>
                    </div>
                    <p class="mt-2">النقاط: {{ $student->total_points ?? 0 }}</p>
                </div>
            @endif
        @empty
            <div class="col-12 text-center text-muted py-3">
                لا توجد نقاط أو إنجازات مسجلة حتى الآن.
            </div>
        @endforelse --}}
    </div>
</div>
