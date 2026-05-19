@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">لوحة التحكم - الأدمن</h2>
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.createUser') }}" class="btn btn-primary">
        + إضافة مستخدم جديد
    </a>
</div>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">عدد الطالبات</h5>
                <h2 class="text-center text-primary">{{ $studentsCount }}</h2>
           <a href="{{ route('admin.listStudents') }}" class="btn btn-primary">
    عرض الطالبات
</a>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">عدد المعلمات</h5>
                <h2 class="text-center text-success">{{ $teachersCount }}</h2>
            <a href="{{ route('admin.listTeachers') }}" class="btn btn-primary">
    عرض الأنسات
</a>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">سجلات اليوم</h5>
                <h2 class="text-center text-danger">{{ $todayRecords }}</h2>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">مجموع نقاط اليوم</h5>
                <h2 class="text-center text-warning">{{ $todayPoints }}</h2>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">مجموع نقاط الأسبوع</h5>
                <h2 class="text-center text-info">{{ $weeklyPoints }}</h2>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="card shadow-sm p-3 mb-4">
                <h5 class="text-center">مجموع نقاط الشهر</h5>
                <h2 class="text-center text-secondary">{{ $monthlyPoints }}</h2>
            </div>
        </div>

    </div>
   <form action="{{ route('logout') }}" method="POST" style="display:inline;">
    @csrf
    <button class="btn btn-danger">تسجيل خروج</button>
</form>
</div>
@endsection
