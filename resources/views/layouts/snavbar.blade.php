<nav class="navbar">
    <div class="logo">
        <a href="https://www.facebook.com/share/1ZcLhBXBce/" target="_blank" rel="noopener noreferrer">
            <img src="{{ asset('stylingtools/logo.png') }}" alt="Logo">
        </a>
    </div>

    <div class="options">
        <ul>
            <li><a class="nav-link" href="{{ route('admin.home') }}">الصفحة الرئيسية</a></li>
            <li><a class="nav-link" href="{{ route('admin.sstudents') }}"> قائمة الطالبات </a></li>
            <li><a class="nav-link" href="{{ route('/') }}"> Top 3 </a></li>
        </ul>
    </div>
</nav>
