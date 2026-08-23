<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Cinema</title>

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

        /* Home background */

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

        /* Dark transparent layer */

        .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            backdrop-filter: blur(3px);
        }

        /* Login container */

        .auth-container {
            position: relative;
            z-index: 2;

            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px 20px;
        }

        /* Login card */

        .auth-card {
            width: 100%;
            max-width: 430px;

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

        .password-row {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 7px;
        }

        .password-row label {
            margin-bottom: 0;
        }

        .forgot-link {
            color: #6b7280;
            font-size: 12px;
            text-decoration: none;
        }

        .forgot-link:hover {
            color: #111827;
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

            transition: background 0.2s;
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

        @media (max-width: 500px) {

            .auth-card {
                padding: 30px 25px;
            }

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


    <!-- Login form -->

    <div class="auth-container">

        <div class="auth-card">

            <div class="auth-header">

                <div class="logo">
                    🎬
                </div>

                <h1>
                    Welcome Back
                </h1>

                <p>
                    Login to continue exploring Cinema.
                </p>

            </div>


            <form
                method="POST"
                action="{{ route('login') }}"
            >

                @csrf


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
                        autofocus
                        autocomplete="email"
                    >

                    @error('email')

                        <span class="form-error">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <div class="form-group">

                    <div class="password-row">

                        <label for="password">
                            Password
                        </label>

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot-link"
                        >
                            Forgot password?
                        </a>

                    </div>


                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Enter your password"
                        required
                        autocomplete="current-password"
                    >

                    @error('password')

                        <span class="form-error">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <button
                    type="submit"
                    class="auth-btn"
                >
                    Login
                </button>

            </form>


            <div class="auth-footer">

                Don't have an account?

                <a href="{{ route('register') }}">
                    Create Account
                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>