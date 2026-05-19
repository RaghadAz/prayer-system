<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Tajawal", sans-serif;
            background: #f5f5f5;
        }
    </style>


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">الإنجاز</a>
<a href="javascript:history.back()" class="btn btn-primary">
    ←
</a>

        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>
