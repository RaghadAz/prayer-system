@extends('layouts.app')

@section('content')
    <style>
        .pink-hub-wrapper {
            min-height: 75vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(160deg, #fff5f8 0%, #ffe6ef 100%);
            border-radius: 24px;
            padding: 32px 20px;
        }

        .pink-hub-card {
            width: 100%;
            max-width: 520px;
            background: #ffffff;
            border: 1px solid #ffd1e3;
            border-radius: 24px;
            padding: 32px 24px;
            box-shadow: 0 12px 32px rgba(219, 112, 147, 0.12);
            text-align: center;
        }

        .pink-hub-title {
            color: #8b2e52;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .pink-hub-subtitle {
            color: #9e6b7f;
            font-size: 0.95rem;
            margin-bottom: 28px;
        }

        .pink-big-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            padding: 20px 24px;
            font-size: 1.2rem;
            font-weight: 700;
            border-radius: 18px;
            text-decoration: none;
            transition: transform 0.18s ease, box-shadow 0.18s ease, background-color 0.18s ease;
        }

        .pink-big-btn:hover {
            transform: translateY(-2px);
        }

        .pink-big-btn--primary {
            background-color: #f48fb1;
            color: #ffffff;
            box-shadow: 0 8px 20px rgba(244, 143, 177, 0.35);
        }

        .pink-big-btn--primary:hover {
            background-color: #ec739d;
            color: #ffffff;
        }

        .pink-big-btn--soft {
            background-color: #fff0f5;
            color: #9c2b58;
            border: 2px solid #f8bbd0;
            box-shadow: 0 6px 16px rgba(248, 187, 208, 0.22);
        }

        .pink-big-btn--soft:hover {
            background-color: #ffe2ec;
            color: #831d46;
        }
    </style>

    <div class="container mt-3" dir="rtl">
        <div class="pink-hub-wrapper">
            <div class="pink-hub-card">

                <div class="d-grid gap-3">
                    <a href="{{ route('admin.sstudents') }}" class="pink-big-btn pink-big-btn--primary">
                        <span> ا.سلام </span>
                    </a>

                    <a href="{{ route('admin.dashboard') }}" class="pink-big-btn pink-big-btn--soft">
                        <span> رغودة </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
