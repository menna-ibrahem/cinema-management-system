<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cinema</title>

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

        /* ================= NAVBAR ================= */

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
    padding: 9px 16px;
    border-radius: 7px;
    font-size: 14px;
}

.login-btn {
    color: white;
    border: 1px solid #4b5563;
}

.register-btn {
    background: white;
    color: #111827;
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

.menu-container {
    position: relative;
}

.menu-btn {
    background: transparent;
    border: none;
    color: white;
    font-size: 26px;
    cursor: pointer;
    padding: 5px 8px;
    line-height: 1;
}

.menu-btn:hover {
    color: #d1d5db;
}

.menu-dropdown {
    display: none;
    position: absolute;
    top: 42px;
    right: 0;
    width: 160px;
    background: #1f2937;
    border: 1px solid #374151;
    border-radius: 10px;
    padding: 8px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    z-index: 1000;
}

.menu-dropdown.show {
    display: block;
}

.menu-dropdown a {
    display: block;
    padding: 10px 12px;
    border-radius: 7px;
    color: #d1d5db;
    font-size: 14px;
}

.menu-dropdown a:hover {
    background: #374151;
    color: white;
}


/* ================= HERO ================= */

.hero {
    position: relative;
    min-height: 430px;
    padding: 80px 6% 70px;
    display: flex;
    align-items: center;
    overflow: hidden;

    background:
        radial-gradient(
            ellipse 70% 90% at 82% 50%,
            rgba(127, 29, 45, 0.18),
            rgba(127, 29, 45, 0.07) 35%,
            transparent 70%
        );

    /* دمج ناعم من فوق وتحت */
    mask-image: linear-gradient(
        to bottom,
        transparent 0%,
        black 10%,
        black 90%,
        transparent 100%
    );

    -webkit-mask-image: linear-gradient(
        to bottom,
        transparent 0%,
        black 10%,
        black 90%,
        transparent 100%
    );
}

.hero::after {
    content: "";
    position: absolute;
    width: 520px;
    height: 520px;
    right: -160px;
    top: 50%;
    transform: translateY(-50%);
    border-radius: 50%;
    background: rgba(127, 29, 45, 0.08);
    filter: blur(110px);
    pointer-events: none;
}

.hero-content {
    position: relative;
    z-index: 1;
    max-width: 720px;
}

.hero-label {
    display: inline-block;
    margin-bottom: 18px;
    color: #d1d5db;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 3px;
}

.hero h1 {
    font-size: clamp(42px, 6vw, 72px);
    line-height: 1.05;
    margin-bottom: 22px;
    letter-spacing: -2px;
}

.hero h1 span {
    display: block;
    color: #b91c3b;
}

.hero p {
    max-width: 580px;
    color: #9ca3af;
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 30px;
}

.hero-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    border-radius: 8px;
    background: #b91c3b;
    color: white;
    font-size: 14px;
    font-weight: 600;
    transition: 0.2s ease;
}

.hero-btn span {
    font-size: 18px;
    transition: transform 0.2s ease;
}

.hero-btn:hover {
    background: #991b35;
    transform: translateY(-2px);
}

.hero-btn:hover span {
    transform: translateX(4px);
}
        /* ================= MOVIES ================= */

        .movies-section {
    padding: 30px 6% 80px;
}

.section-title {
    font-size: 30px;
    margin-bottom: 28px;
    letter-spacing: -0.5px;
}

.movies-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 26px;
    width: 100%;
}

.movie-card {
    width: 100%;
    background: #1a2230;
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 14px;
    overflow: hidden;
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        border-color 0.3s ease;
}

.movie-card:hover {
    transform: translateY(-8px);
    border-color: rgba(185, 28, 59, 0.35);
    box-shadow: 0 18px 40px rgba(0, 0, 0, 0.35);
}

.movie-image {
    width: 100%;
    height: 310px;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}

.movie-card:hover .movie-image {
    transform: scale(1.04);
}

        .movie-content {
            padding: 17px;
        }

.movie-title {
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 9px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.movie-year {
    color: #9ca3af;
    font-size: 13px;
    margin-bottom: 8px;
}

.movie-rating {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 4px;
}

        /* ================= WATCHLIST ================= */

.watchlist-btn {
    width: 100%;
    margin-top: 14px;
    padding: 11px 12px;
    border: 1px solid rgba(185, 28, 59, 0.5);
    border-radius: 8px;
    background: rgba(127, 29, 45, 0.18);
    color: #f3f4f6;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s ease;
}

.watchlist-btn:hover {
    background: #b91c3b;
    border-color: #b91c3b;
    transform: translateY(-1px);
}

        /* ================= NO RESULTS ================= */

        .no-results {
            color: #9ca3af;
            text-align: center;
            padding: 50px 0;
            font-size: 16px;
        }

        /* ================= RESPONSIVE ================= */

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

        @media (max-width: 600px) {

            .navbar {
                padding: 0 4%;
            }

            .hero {
    min-height: 380px;
    padding-top: 60px;
    padding-bottom: 50px;
}

.hero h1 {
    font-size: 42px;
    letter-spacing: -1px;
}

.hero p {
    font-size: 15px;
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

    <!-- Navbar -->

    @include('layouts.navbar')

    <!-- Hero -->

<section class="hero">

    <div class="hero-content">

        <span class="hero-label">WELCOME TO CINEMA</span>

        <h1>
            Discover Your
            <span>Next Movie</span>
        </h1>

        <p>
            Explore a carefully selected collection of movies,
            discover unforgettable stories, and find your next
            favorite film.
        </p>

        <a href="#movies" class="hero-btn">
            Explore Movies
            <span>→</span>
        </a>

    </div>

</section>


    <!-- Movies -->

    <section class="movies-section" id="movies">

        <h2 class="section-title">
            Movies
        </h2>

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


    <!-- Menu Script -->

    <script>
        const menuBtn = document.querySelector('.menu-btn');
        const menuDropdown = document.querySelector('.menu-dropdown');

        if (menuBtn && menuDropdown) {

            menuBtn.addEventListener('click', function () {
                menuDropdown.classList.toggle('show');
            });

        }
    </script>

</body>

</html>