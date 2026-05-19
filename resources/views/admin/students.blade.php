@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">قائمة الطالبات</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>اسم الطالبة</th>
                <th>اسم المستخدم</th>
                <th>الأنسة التابعة لها</th>
                <th>العمليات</th>
            </tr>
        </thead>

        <tbody>
            @foreach($students as $index => $student)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $student->user->name }}</td>
                    <td>{{ $student->user->username }}</td>
                    <td>
                        {{ $student->teacher ? $student->teacher->user->name : '—' }}
                    </td>

                    <td>

<a href="{{ route('admin.showStudent', $student->id) }}" class="btn btn-info btn-sm">
    عرض
</a>

                        <form action="{{ route('admin.deleteUser', $student->user->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('هل تريدين حذف هذه الطالبة؟');">
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
