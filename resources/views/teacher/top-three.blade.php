<div class="container mt-4">
    <h3 class="text-center mb-4">أفضل 3 طالبات</h3>

    <div class="row justify-content-center">
        @foreach($topThree as $student)
            <div class="col-4 text-center">
                <div style="
                    width:140px;
                    height:140px;
                    border-radius:50%;
                    background:linear-gradient(135deg, #d4af37, #f7e98e);
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    margin:auto;
                    font-weight:bold;
                    font-size:20px;
                    color:#000;">
                    {{ $student->user->name ?? '-'}}
                </div>
                <p class="mt-2">النقاط: {{ $student->total_points }}</p>
            </div>
        @endforeach
    </div>
</div>
