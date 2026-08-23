<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search Movies - Cinema</title>

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

        .navbar {
            height: 70px;
            padding: 0 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #111827;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-btn {
            text-decoration: none;
            padding: 9px 16px;
            border-radius: 7px;
            font-size: 14px;
        }

        .home-btn {
            color: white;
            border: 1px solid #4b5563;
        }

        .logout-btn {
            background: #7f1d2d;
            color: white;
            border: none;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #6b1725;
        }

        .search-section {
            padding: 60px 6%;
        }

        .page-title {
            font-size: 36px;
            margin-bottom: 30px;
        }

        .filters {
            display: flex;
            gap: 12px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 220px;
            padding: 13px 15px;

            border: 1px solid #374151;
            border-radius: 8px;

            background: #1f2937;
            color: white;

            font-size: 14px;
            outline: none;
        }

        .search-box::placeholder {
            color: #9ca3af;
        }

        .search-box:focus {
            border-color: #6b7280;
        }

        .rating-filter {
            padding: 13px 15px;

            border: 1px solid #374151;
            border-radius: 8px;

            background: #1f2937;
            color: white;

            font-size: 14px;
            outline: none;

            cursor: pointer;
        }

        .filter-btn {
            padding: 13px 20px;

            border: none;
            border-radius: 8px;

            background: white;
            color: #111827;

            font-size: 14px;
            font-weight: 600;

            cursor: pointer;
        }

        .filter-btn:hover {
            background: #e5e7eb;
        }

.movies-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 24px;
    width: 100%;
}

.movie-card {
    width: 100%;
    min-width: 0;
    background: #1f2937;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.2s;
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
            margin-bottom: 12px;
        }

        .watchlist-btn {
            width: 100%;
            padding: 10px 12px;

            border: none;
            border-radius: 8px;

            background: #7f1d2d;
            color: white;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;
        }

        .watchlist-btn:hover {
            background: #6b1725;
        }

        .no-results {
            color: #9ca3af;
            text-align: center;
            padding: 50px 0;
            font-size: 16px;
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 0 4%;
            }

            .search-section {
                padding-left: 4%;
                padding-right: 4%;
            }

            .page-title {
                font-size: 30px;
            }
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
}
    </style>

</head>

<body>

    @include('layouts.navbar')

    <section class="search-section">

        <h1 class="page-title">
            Search Movies
        </h1>


        <form
            action="{{ route('search') }}"
            method="GET"
            class="filters"
        >

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="🔍 Search for a movie..."
                class="search-box"
            >


            <select
                name="rating"
                class="rating-filter"
            >

                <option value="">
                    All Ratings
                </option>

                <option
                    value="9"
                    {{ request('rating') == '9' ? 'selected' : '' }}
                >
                    ⭐ 9+
                </option>

                <option
                    value="8"
                    {{ request('rating') == '8' ? 'selected' : '' }}
                >
                    ⭐ 8+
                </option>

                <option
                    value="7"
                    {{ request('rating') == '7' ? 'selected' : '' }}
                >
                    ⭐ 7+
                </option>

                <option
                    value="6"
                    {{ request('rating') == '6' ? 'selected' : '' }}
                >
                    ⭐ 6+
                </option>

            </select>


            <button
                type="submit"
                class="filter-btn"
            >
                Search
            </button>

        </form>


        @if ($movies->count() > 0)

            <div class="movies-grid">

                @foreach ($movies as $movie)

                    <div class="movie-card">

                        @if ($movie->image)

    <a href="{{ route('movies.show', $movie) }}">

        <img
            src="{{ asset('storage/' . (str_starts_with($movie->image, 'movies/')
                ? $movie->image
                : 'movies/' . $movie->image)) }}"
            alt="{{ $movie->title }}"
            class="movie-image"
        >

    </a>

@endif


                        <div class="movie-content">

                            <h3 class="movie-title">
                                {{ $movie->title }}
                            </h3>

                            <p class="movie-year">
                                {{ $movie->release_year }}
                            </p>

                            <p class="movie-rating">
                                ⭐ {{ $movie->rating }}/10
                            </p>


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
                                        Add to Watchlist
                                    </button>

                                </form>

                            @endauth

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="no-results">
                🎬 No movies found.
            </div>

        @endif

    </section>

</body>

</html>