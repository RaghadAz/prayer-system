@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>

    <div class="container mt-4">

        <h2 class="dashboard-title text-center">📘 لوحة الطالب — {{ $student->user->name }}</h2>
        <button onclick="openMessageModal()" class="notification-badge-btn" title="رسالة الإدارة">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                class="bi bi-envelope-heart" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
            </svg>
            <span class="pulse-dot"></span>
        </button>

        <div id="messageModal" class="custom-modal" style="display: none;">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>📢 رسالة مهمة للطالبات</h3>
                    <button onclick="closeMessageModal()" class="close-btn">&times;</button>
                </div>
                <div class="modal-body">
                    <p>الأيام تمضي أسرع مما تتخيل، وكل لحظة تمر هي لبنة إضافية في جدار مستقبلك. لا تثقل قلبك بندم على ما
                        فات، فالتجارب ليست سوى وقود للتعلم. عش بشغف، اسعَ بحلم، واجعل من أثرك في هذه الحياة علامة فارقة
                        لا تمحوها الرياح. تذكر دائماً: الإنسان لا يموت حين يتوقف نبضه، بل حين يتوقف عن ترك أثر طيب خلفه.
                        🌸</p>
                </div>
                <div class="modal-footer">
                    <button onclick="closeMessageModal()" class="btn-ok">حسناً، فهمت</button>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="dashboard-card">
                    <h5>نقاط اليوم</h5>
                    <h3>{{ $todayPoints }}</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-card">
                    <h5>نقاط الأسبوع</h5>
                    <h3>{{ $weekPoints }}</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-card">
                    <h5>نقاط الشهر</h5>
                    <h3>{{ $monthPoints }}</h3>
                </div>
            </div>

        </div>

        <div class="dashboard-box">
            <h4>📊 ترتيبك بين الطالبات</h4>
            <h3 class="text-center">{{ $ranking }}</h3>
        </div>


        @include('student.top-three')
        {{-- <div class="dashboard-box">
            <h4>🏆 أفضل 3 طالبات</h4>

            <table class="table">
                <thead>
                    <tr>
                        <th>اسم الطالبة</th>
                        <th>مجموع النقاط</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($topThree as $student)
                        <tr>
                            <td>{{ $student->user->name ?? 'مستخدم غير متوفر' }}</td>
                            <td>{{ $student->total_points }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted py-3">
                                لا توجد نقاط أو إنجازات مسجلة حتى الآن.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div> --}}

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-btn w-100 text-white">تسجيل خروج</button>
        </form>

    </div>
@endsection
