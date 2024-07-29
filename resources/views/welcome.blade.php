<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet" />
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
         body {
            margin: 0;
            height: 100vh;
            display: flex;
            font-family: 'Roboto Mono', monospace; /* New font */
            background-color: #fff;
        }

        .image-side {
            flex: 1;
            background-image: url('/images/2.avif');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .text-side {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 2rem;
            margin: 0;
            box-shadow: none;
        }

        .buttons {
            display: flex;
            margin-top: 2rem;
        }

        .buttons a {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin-left: 1rem;
            border-radius: 0.375rem;
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .login-button {
            background-color: #3b82f6;
        }

        .register-button {
            background-color: #22c55e;
        }

        .text-side h1, .text-side h2 {
            font-size: 4rem;
            font-weight: bold;
            margin: 0;
            overflow: hidden; /* Ensures the text stays within the container */
            white-space: nowrap; /* Prevents the text from wrapping */
            border-right: .15em solid orange; /* The caret */
        }

        .text-side h1 {
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end 3.5s forwards;
        }

        .text-side h2 {
            animation: typing2 4.5s steps(40, end), blink-caret2 .75s step-end 4.5s forwards;
        }

        /* Animation keyframes */
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes typing2 {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: orange }
        }

        @keyframes blink-caret2 {
            from, to { border-color: transparent }
            50% { border-color: orange }
        }
    </style>
</head>
<body>
    <div class="image-side">
        <!-- You can optionally add content here if needed -->
    </div>
    
    <div class="text-side">
        <h1 class="typed">Bienvenue sur <br> ImmoPlus</h1>
        
        <div class="buttons">
            <a href="{{ route('account.login') }}" class="login-button">Login</a>
            <a href="{{ route('account.register') }}" class="register-button">Register</a>
        </div>
    </div>
</body>
</html>
