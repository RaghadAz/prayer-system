@extends('layouts.app')

@section('content')
@include('layouts.navbar')

<link rel="stylesheet" href="{{ asset('style.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">



<main class="content">
    <section class="page-header">
        <h1>البرنامج اليومي</h1>
    </section>

<form id="questionsForm" class="questions-form" onsubmit="return false" method="POST" action="/student/daily-program/save" >
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
    const saveDailyProgramUrl = "{{ route('student.daily.save') }}";
</script>

<script src="{{ asset('script.js') }}"></script>


@endsection
