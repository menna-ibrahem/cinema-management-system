<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $movie->title }} - Cinema</title>

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
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ================= PAGE ================= */

        .movie-details {
            min-height: calc(100vh - 70px);
            padding: 70px 6%;
            display: flex;
            align-items: center;
        }

        .movie-container {
            width: 100%;
            max-width: 1100px;
            margin: auto;

            display: grid;
            grid-template-columns: 330px 1fr;
            gap: 55px;
            align-items: center;
        }

        /* ================= POSTER ================= */

        .poster-wrapper {
            position: relative;
        }

        .poster-wrapper::after {
            content: "";
            position: absolute;
            inset: 20px -20px -20px 20px;
            background: rgba(127, 29, 45, 0.2);
            filter: blur(35px);
            z-index: 0;
        }

        .movie-poster {
            position: relative;
            z-index: 1;

            width: 100%;
            height: 470px;

            object-fit: cover;
            border-radius: 14px;

            display: block;

            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.45);
        }

        /* ================= CONTENT ================= */

        .movie-info {
            max-width: 650px;
        }

        .movie-label {
            display: inline-block;
            margin-bottom: 16px;

            color: #b91c3b;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .movie-info h1 {
            font-size: clamp(38px, 5vw, 60px);
            line-height: 1.05;
            margin-bottom: 18px;
            letter-spacing: -1.5px;
        }

        .movie-meta {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 25px;

            color: #9ca3af;
            font-size: 14px;
        }

        .rating {
            color: white;
            font-weight: 600;
        }

        .description {
            color: #9ca3af;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        /* ================= BUTTONS ================= */

        .actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .back-btn,
        .watchlist-btn {
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .back-btn {
            border: 1px solid #374151;
            color: #d1d5db;
        }

        .back-btn:hover {
            background: #1f2937;
            color: white;
        }

        .watchlist-btn {
            border: 1px solid #b91c3b;
            background: #b91c3b;
            color: white;
        }

        .watchlist-btn:hover {
            background: #991b35;
            transform: translateY(-2px);
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 800px) {

            .movie-details {
                padding: 50px 6%;
            }

            .movie-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .poster-wrapper {
                max-width: 330px;
                margin: auto;
            }

            .movie-info {
                text-align: center;
                margin: auto;
            }

            .movie-meta,
            .actions {
                justify-content: center;
            }

        }

        @media (max-width: 500px) {

            .movie-poster {
                height: 420px;
            }

            .movie-info h1 {
                font-size: 38px;
            }

            .description {
                font-size: 15px;
            }

        }

    </style>

</head>

<body>

    @include('layouts.navbar')


    <main class="movie-details">

        <div class="movie-container">


            <!-- Poster -->

            <div class="poster-wrapper">

                @if ($movie->image)

                    <img
                        src="{{ asset('storage/' . (str_starts_with($movie->image, 'movies/')
                            ? $movie->image
                            : 'movies/' . $movie->image)) }}"
                        alt="{{ $movie->title }}"
                        class="movie-poster"
                    >

                @endif

            </div>


            <!-- Movie Information -->

            <div class="movie-info">

                <span class="movie-label">
                    MOVIE DETAILS
                </span>

                <h1>
                    {{ $movie->title }}
                </h1>

                <div class="movie-meta">

                    <span>
                        {{ $movie->release_year }}
                    </span>

                    <span>•</span>

                    <span class="rating">
                        ⭐ {{ $movie->rating }}/10
                    </span>

                </div>

                <p class="description">
                    {{ $movie->description }}
                </p>


                <div class="actions">

                    <a
                        href="{{ url('/') }}"
                        class="back-btn"
                    >
                        ← Back to Movies
                    </a>


                    @auth

                        <form
                            action="{{ route('watchlist.store', $movie) }}"
                            method="POST"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="watchlist-btn"
                            >
                                + Add to Watchlist
                            </button>

                        </form>

                    @endauth

                </div>

            </div>

        </div>

    </main>

</body>

</html>