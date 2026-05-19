@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">معلومات الأنسة</h2>

    <div class="card p-4 shadow">

        <h4>👩‍🏫 اسم الأنسة: {{ $teacher->user->name }}</h4>
        <h5 class="mt-3">عدد الطالبات: {{ $teacher->students->count() }}</h5>

        <hr>

        <h4 class="mb-3">الطالبات:</h4>

        <ul class="list-group">
            @foreach($teacher->students as $student)
                <li class="list-group-item">
                    {{ $student->user->name }}
                </li>
            @endforeach
        </ul>

    </div>

</div>
@endsection
