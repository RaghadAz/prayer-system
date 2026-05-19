@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">إضافة مستخدم جديد</h2>
  @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div style="
        background: #ffe5e5;
        border-left: 6px solid #d9534f;
        padding: 15px;
        border-radius: 6px;
        margin-bottom: 20px;
        color: #a94442;
        font-size: 15px;
    ">
        <strong style="font-size: 17px;">❌ حدثت الأخطاء التالية:</strong>
        <ul style="margin-top: 10px; margin-bottom: 0;">
            @foreach ($errors->all() as $error)
                <li style="margin-bottom: 5px;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('admin.storeUser') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">الاسم</label>
<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">اسم المستخدم (Username)</label>
            <input type="text" name="username" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">النوع</label>
            <select name="role" class="form-control" value="{{ old('name') }}" required>
                <option value="teacher">أنسة</option>
                <option value="student">طالبة</option>
            </select>
        </div>
<div class="mb-3" id="teacherSelect" style="display:none;">
    <label class="form-label">اختاري الأنسة</label>
    <select name="teacher_id" class="form-control">
        @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
        @endforeach
    </select>
</div>

<script>
    document.querySelector('select[name="role"]').addEventListener('change', function() {
        if (this.value === 'student') {
            document.getElementById('teacherSelect').style.display = 'block';
        } else {
            document.getElementById('teacherSelect').style.display = 'none';
        }
    });
</script>

        <button type="submit" class="btn btn-primary w-100">إنشاء المستخدم</button>

    </form>



</div>
@endsection
