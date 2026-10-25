@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        const currentTeacherId = {{ $teacherId ?? 1 }};

        function getActiveSetName() {
            const toggleBtn = document.getElementById('toggle') || document.querySelector('input[type="checkbox"]');
        const isAlternate = toggleBtn ? toggleBtn.checked : false;

        if (Number(currentTeacherId) !== 1) {
            return isAlternate ? 'alternate2' : 'teacher2';
        }

        return isAlternate ? 'alternate' : 'default';
        }
    </script>
    <main class="content">
        <section class="page-header">
            <h1>البرنامج اليومي</h1>
        </section>

        <form id="questionsForm" class="questions-form" onsubmit="return false" method="POST"
            action="/student/daily-program/save">
            @csrf

            <section class="controls">
                <label for="questionToggle" class="toggle-label">
                    <input type="checkbox" id="questionToggle" name="has_excuse">
                    <span class="switch" aria-hidden="true"></span>
                    العذر
                </label>
            </section>

            <section id="questionContainer" class="questions">
                <!-- الأسئلة ستظهر هنا عبر JS -->
            </section>

            <div class="form-actions">
                {{-- <button type="submit" class="submit-btn">حفظ الإجابات</button> --}}
                <button id="saveProgramBtn" type="button" class="submit-btn"> حفظ الإجابات </button>

            </div>

            <p id="saveStatus" class="save-status" aria-live="polite"></p>
        </form>
    </main>
    <script>
        const getTodayAnswersUrl = "{{ route('student.daily.today') }}";
    </script>

    <script>
        const saveDailyProgramUrl = "{{ route('student.daily.save') }}";
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
@endsection
