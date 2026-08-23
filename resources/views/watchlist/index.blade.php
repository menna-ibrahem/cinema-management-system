<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Watchlist</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #111827;
            color: white;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            padding: 60px 6%;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .page-title {
            font-size: 36px;
        }

        .back-btn {
            padding: 10px 18px;
            border: 1px solid #4b5563;
            border-radius: 8px;
            color: #d1d5db;
            transition: 0.2s;
        }

        .back-btn:hover {
            background: #1f2937;
            color: white;
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 24px;
        }

        .movie-card {
            background: #1f2937;
            border-radius: 12px;
            overflow: hidden;
            transition: 0.2s;
        }

        .movie-card:hover {
            transform: translateY(-5px);
        }

        .movie-image {
            width: 100%;
            height: 290px;
            object-fit: cover;
            display: block;
        }

        .movie-content {
            padding: 15px;
        }

        .movie-title {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .movie-year {
            color: #9ca3af;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .movie-rating {
            font-size: 14px;
            margin-bottom: 15px;
        }

        .remove-btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: #7f1d2d;
            color: white;
            cursor: pointer;
            font-weight: 600;
        }

        .remove-btn:hover {
            background: #6b1725;
        }

        .empty {
            text-align: center;
            padding: 80px 20px;
            color: #9ca3af;
        }

        .empty h2 {
            color: white;
            margin-bottom: 10px;
        }

        @media (max-width: 1000px) {
            .movies-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 750px) {
            .movies-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 500px) {
            .movies-grid {
                grid-template-columns: 1fr;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
        }
    </style>
</head>

<body>

    @include('layouts.navbar')

    <main class="container">

        <div class="page-header">

            <h1 class="page-title">
                My Watchlist
            </h1>

            <a href="{{ url('/') }}" class="back-btn">
                ← Back to Movies
            </a>

        </div>


        @if ($watchlist->count() > 0)

            <div class="movies-grid">

                @foreach ($watchlist as $item)

                    @if ($item->movie)

                        <div class="movie-card">

                            @if ($item->movie->image)

                                <a href="{{ route('movies.show', $item->movie) }}">

                                    <img
                                        src="{{ asset('storage/' . (str_starts_with($item->movie->image, 'movies/')
                                            ? $item->movie->image
                                            : 'movies/' . $item->movie->image)) }}"
                                        alt="{{ $item->movie->title }}"
                                        class="movie-image"
                                    >

                                </a>

                            @endif

                            <div class="movie-content">

                                <h3 class="movie-title">
                                    {{ $item->movie->title }}
                                </h3>

                                <p class="movie-year">
                                    {{ $item->movie->release_year }}
                                </p>

                                <p class="movie-rating">
                                    ⭐ {{ $item->movie->rating }}/10
                                </p>

                                <form
                                    action="{{ route('watchlist.destroy', $item) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="remove-btn"
                                    >
                                        Remove from Watchlist
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endif

                @endforeach

            </div>

        @else

            <div class="empty">

                <h2>Your Watchlist is Empty 🎬</h2>

                <p>
                    Start adding movies you want to watch later.
                </p>

            </div>

        @endif

    </main>

</body>

</html>