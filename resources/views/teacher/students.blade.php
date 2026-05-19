@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">طالبات الأنسة</h2>

    <table class="table">
    <thead>
        <tr>
            <th>الاسم</th>
            <th>اسم المستخدم</th>
            <th>النقاط</th>
        </tr>
    </thead>

    <tbody>
        @foreach($students as $student)
        <tr>
            <td>
                <a href="{{ route('teacher.students.show', $student->id) }}" style="text-decoration:none; color:#000000;">
                    {{ $student->user->name }}
                </a>
            </td>

            <td>
                <a href="{{ route('teacher.students.show', $student->id) }}" style="text-decoration:none; color:#000000;">
                    {{ $student->user->username }}
                </a>
            </td>

            <td>{{ $student->total_points }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


</div>
@endsection
