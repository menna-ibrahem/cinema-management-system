<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Cinema Dashboard')</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #222;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */

        .sidebar {
            width: 240px;
            background: #111827;
            color: white;
            padding: 25px 15px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            padding: 0 10px;
            margin-bottom: 40px;
        }

        .nav-link {
            display: block;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 8px;
            color: #d1d5db;
        }

        .nav-link:hover {
            background: #1f2937;
            color: white;
        }

        .logout-btn {
            width: 100%;
            display: block;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            background: #7f1d2d;
            color: white;
            font-family: inherit;
            font-size: 14px;
            text-align: left;
            cursor: pointer;
            margin-top: 25px;
        }

        .logout-btn:hover {
            background: #6b1725;
        }

        /* Main Content */

        .main-content {
            flex: 1;
            padding: 35px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 30px;
        }

        .primary-btn {
            background: #111827;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .primary-btn:hover {
            background: #1f2937;
        }

        /* Success Message */

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        /* Movies Grid */

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 25px;
        }

        .movie-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .movie-image {
            width: 100%;
            height: 320px;
            object-fit: cover;
            display: block;
        }

        .movie-content {
            padding: 18px;
        }

        .movie-title {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .movie-description {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            height: 63px;
            overflow: hidden;
            margin-bottom: 12px;
        }

        .movie-info {
            font-size: 14px;
            margin-bottom: 6px;
        }

        .rating {
            font-weight: bold;
            margin-bottom: 15px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .edit-btn,
        .delete-btn {
            border: none;
            padding: 9px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
        }

        .edit-btn {
            background: #e5e7eb;
            color: #111827;
        }

        .delete-btn {
            background: #dc2626;
            color: white;
        }

        .delete-form {
            display: inline;
        }

        /* Responsive */

        @media (max-width: 768px) {

            .sidebar {
                width: 190px;
            }

            .main-content {
                padding: 20px;
            }
        }

        @media (max-width: 600px) {

            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

        /* Movie Form */

        .form-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #374151;
        }

        .form-input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus {
            border-color: #111827;
            box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.08);
        }

        textarea.form-input {
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .file-input {
            padding: 9px;
            background: #f9fafb;
        }

        .form-error {
            display: block;
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .current-image {
            margin-bottom: 22px;
        }

        .current-image p {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .current-image img {
            display: block;
            width: 220px;
            height: auto;
            max-height: 320px;
            object-fit: contain;
            border-radius: 10px;
            margin-top: 10px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .secondary-btn {
            background: #e5e7eb;
            color: #111827;
            padding: 11px 18px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            text-decoration: none;
        }

        @media (max-width: 600px) {

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <aside class="sidebar">

        <div class="logo">
            🎬 Cinema
        </div>

        <nav>

            <a
                href="{{ route('movies.index') }}"
                class="nav-link"
            >
                🎬 Movies
            </a>

            <a
                href="{{ route('movies.create') }}"
                class="nav-link"
            >
                ➕ Add Movie
            </a>

            <form
                action="{{ route('logout') }}"
                method="POST"
            >
                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >
                    🚪 Logout
                </button>
            </form>

        </nav>

    </aside>

    <main class="main-content">

        @if(session('success'))

            <div class="alert-success">
                {{ session('success') }}
            </div>

        @endif

        @yield('content')

    </main>

</div>

</body>
</html>