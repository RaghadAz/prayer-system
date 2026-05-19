@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-5">

    <div class="card shadow-lg" style="width: 420px; border-radius: 15px;">
        <div class="card-body text-center">

            <h3 class="mb-3" style="font-weight: bold; color:#333;">
                تم إنشاء المستخدم بنجاح 🎉
            </h3>

            <p class="text-muted mb-4">
                هاي معلومات تسجيل الدخول، اعطيها للأنسة/الطالبة.
            </p>

            <div class="p-3 mb-3" style="background:#f7f7f7; border-radius:10px;">
                <h5 class="mb-2">👤 اسم المستخدم:</h5>
                <p class="fw-bold fs-5">{{ $username }}</p>

                <h5 class="mt-3 mb-2">🔐 كلمة السر:</h5>
                <p class="fw-bold fs-4 text-primary">{{ $password }}</p>
            </div>

            <a href="{{ route('admin.createUser') }}" class="btn btn-success w-100 mt-3">
                إنشاء مستخدم جديد
            </a>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary w-100 mt-2">
                العودة للوحة التحكم
            </a>

        </div>
    </div>

</div>
@endsection
