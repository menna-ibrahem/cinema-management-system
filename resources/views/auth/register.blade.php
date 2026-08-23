<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Cinema</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            background: #111827;
            color: white;
        }

        .auth-page {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        /*
        Home background
        */

        .home-background {
            position: absolute;
            inset: 0;
            overflow: hidden;
            filter: blur(6px);
            transform: scale(1.05);
        }

        .home-background iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /*
        Dark transparent layer
        */

        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            backdrop-filter: blur(3px);
        }

        /*
        Register container
        */

        .auth-container {
            position: relative;
            z-index: 2;

            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px 20px;
        }

        /*
        Register card
        */

        .auth-card {
            width: 100%;
            max-width: 450px;

            padding: 40px;

            background: rgba(255, 255, 255, 0.96);

            color: #111827;

            border-radius: 18px;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.35);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .auth-header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .auth-header p {
            color: #6b7280;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: 600;
        }

        .form-input {
            width: 100%;

            padding: 12px 14px;

            border: 1px solid #d1d5db;
            border-radius: 8px;

            font-size: 14px;

            outline: none;

            transition: border-color 0.2s;
        }

        .form-input:focus {
            border-color: #111827;
        }

        .form-error {
            display: block;
            margin-top: 5px;

            color: #dc2626;
            font-size: 12px;
        }

        .auth-btn {
            width: 100%;

            padding: 13px;

            border: none;
            border-radius: 8px;

            background: #111827;
            color: white;

            font-size: 15px;
            font-weight: 600;

            cursor: pointer;

            margin-top: 5px;
        }

        .auth-btn:hover {
            background: #1f2937;
        }

        .auth-footer {
            text-align: center;

            margin-top: 22px;

            color: #6b7280;
            font-size: 14px;
        }

        .auth-footer a {
            color: #111827;
            font-weight: 600;
            text-decoration: none;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>

<div class="auth-page">


    <!-- Home in background -->

    <div class="home-background">

        <iframe
            src="{{ url('/') }}"
            title="Cinema Home"
        ></iframe>

    </div>


    <!-- Blur / transparent overlay -->

    <div class="overlay"></div>


    <!-- Register form -->

    <div class="auth-container">

        <div class="auth-card">

            <div class="auth-header">

                <div class="logo">
                    🎬
                </div>

                <h1>
                    Create Account
                </h1>

                <p>
                    Join Cinema and discover amazing movies.
                </p>

            </div>


            <form
                method="POST"
                action="{{ route('register') }}"
            >

                @csrf


                <div class="form-group">

                    <label for="name">
                        Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-input"
                        placeholder="Enter your name"
                        required
                        autofocus
                        autocomplete="name"
                    >

                    @error('name')

                        <span class="form-error">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-input"
                        placeholder="Enter your email"
                        required
                        autocomplete="email"
                    >

                    @error('email')

                        <span class="form-error">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Create a password"
                        required
                        autocomplete="new-password"
                    >

                    @error('password')

                        <span class="form-error">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <div class="form-group">

                    <label for="password_confirmation">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-input"
                        placeholder="Confirm your password"
                        required
                        autocomplete="new-password"
                    >

                </div>


                <button
                    type="submit"
                    class="auth-btn"
                >
                    Create Account
                </button>

            </form>


            <div class="auth-footer">

                Already have an account?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>