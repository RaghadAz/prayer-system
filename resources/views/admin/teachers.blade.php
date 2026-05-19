@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">قائمة الأنسات</h2>

    {{-- رسالة نجاح --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>اسم الأنسة</th>
                <th>اسم المستخدم</th>
                <th>عدد الطالبات</th>
                <th>العمليات</th>
            </tr>
        </thead>

        <tbody>
            @foreach($teachers as $index => $teacher)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $teacher->user->name }}</td>
                    <td>{{ $teacher->user->username }}</td>
                    <td>{{ $teacher->students_count }}</td>

                    <td>

                      <a href="{{ route('admin.showTeacher', $teacher->id) }}" class="btn btn-info btn-sm">
    عرض
</a>


                        <form action="{{ route('admin.deleteUser', $teacher->user->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('هل تريدين حذف هذه الأنسة؟');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">حذف</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
