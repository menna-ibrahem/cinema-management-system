<style>
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
</style>

<nav class="navbar">

    <div class="logo">
        🎬 Cinema
    </div>

    <div class="nav-links">

        @guest

            <a
                href="{{ route('login') }}"
                class="nav-btn login-btn"
            >
                Login
            </a>

            <a
                href="{{ route('register') }}"
                class="nav-btn register-btn"
            >
                Register
            </a>

        @else

            <form
                action="{{ route('logout') }}"
                method="POST"
                style="display: inline;"
            >
                @csrf

                <button
                    type="submit"
                    class="nav-btn logout-btn"
                >
                    Logout
                </button>
            </form>

            <div class="menu-container">

                <button
                    class="menu-btn"
                    type="button"
                >
                    ☰
                </button>

                <div class="menu-dropdown">

    <a href="{{ url('/') }}">
        Home
    </a>

    <a href="{{ route('search') }}">
        Search
    </a>

    <a href="{{ route('watchlist.index') }}">
        My Watchlist
    </a>

    <a href="{{ route('chatbot') }}">
        AI Chatbot
    </a>

</div>

            </div>

        @endguest

    </div>

</nav>

<script>
    const menuBtn = document.querySelector('.menu-btn');
    const menuDropdown = document.querySelector('.menu-dropdown');

    if (menuBtn && menuDropdown) {

        menuBtn.addEventListener('click', function () {
            menuDropdown.classList.toggle('show');
        });

    }
</script>