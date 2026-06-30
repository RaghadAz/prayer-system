<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #d97ef5, #eee9ec);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Tajawal", sans-serif;
        }

        .login-card {
            width: 380px;
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            animation: fadeIn 0.6s ease;
        }

        .login-card h3 {
            font-weight: bold;
            color: #444;
        }

        .btn-login {
            background: #e19af7;
            border: none;
        }

        .btn-login:hover {
            background: #e9a9f3;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>




    <div class="login-card app-card">
<div class="text-center mb-3">
            <a href="https://www.facebook.com/share/1NzVRJ1ULk/"><img src="{{asset('stylingtools/logo.png')}}" width="100"alt="الإنجاز">
            </a><hr>
        {{-- <a href="https://www.facebook.com/share/1NzVRJ1ULk/" style="color: #e19af7">جامع الخير</a> --}}

        </div>
        <h3 class="text-center mb-4">تسجيل الدخول</h3>

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">اسم المستخدم</label>
                <input type="text" name="username" class="form-control" placeholder="أدخل اسم المستخدم" required>
            </div>

            <div class="mb-3">
                <label class="form-label">كلمة السر</label>
                <input type="password" name="password" class="form-control" placeholder="••••••" required>
            </div>

            <button type="submit" class="btn btn-login text-white w-100 mt-2 py-2">
                دخول
            </button>
        </form>
    </div>

</body>
</html>
