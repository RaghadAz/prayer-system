@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('style.css') }}">

<div class="container mt-4">

    <h2 class="students-title text-center">طالبات الأنسة</h2>

    <div class="students-box">

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
                        <a href="{{ route('teacher.students.show', $student->id) }}" class="student-link">
                            {{ $student->user->name }}
                        </a>
                    </td>

                    <td>
                        <a href="{{ route('teacher.students.show', $student->id) }}" class="student-link">
                            {{ $student->user->username }}
                        </a>
                    </td>

                    <td>{{ $student->total_points }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
