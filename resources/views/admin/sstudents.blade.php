@extends('layouts.app')
@extends('layouts.snavbar')


@section('content')
    <div class="container mt-4">

        <h2 class="mb-4 text-center">قائمة الطالبات</h2>

        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>اسم الطالبة</th>
                    <th>النقاط</th>
                    <th>الأنسة التابعة لها</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $index => $student)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><a href="{{ route('admin.showStudent', $student->id) }}"
                                class="student-link">{{ $student->user->name }}</a></td>
                        <td>{{ $student->weeklyPoints ?? 0 }}</td>
                        <td>
                            {{ $student->teacher ? $student->teacher->user->name : '—' }}
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
