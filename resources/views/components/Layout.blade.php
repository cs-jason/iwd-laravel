<!doctype html>
<html>
    <head>
        <!-- Set the character encoding and viewport for responsiveness -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Include Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <!-- Link to various Google Fonts used in the layout -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=UnifrakturCook:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Meie+Script&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400&display=swap" rel="stylesheet">

        <!-- Set the favicon for the website -->
        <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">

        <!-- Set the title of the page using the provided '$title' variable -->
        <title>{{ $title }} | Bunny</title>
    </head>

    <body>
        <!-- Main container with padding and alignment -->
        <div class="px-6 flex flex-col bg-gray-100 items-center md:px-32">
            <div class="custom-max-5xl">
                <!-- Navigation section -->
                <nav class="py-8 flex justify-between items-center">
                   
                    <!-- Display logo and brand text -->
                    <a href="/" class="flex gap-2 items-center transition duration-200 ease-in-out active:translate-y-0.5">
                        <img src="{{ URL('images/bunny-logo.png') }}" class="w-10 h-10"/>
                        <p class="text-2xl font-semibold text-gray-800 brand">Bunny</p>
                    </a>
                    @auth
                        <!-- Display settings and sign out options for authenticated users -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="space-x-6 md:space-x-8">
                            @csrf
                            <a href="/settings" class="text-base text-gray-500 hover:text-gray-700">Settings</a>
                            <button type="submit" class="text-base text-gray-500 hover:text-gray-700">Sign Out</button>
                        </form>
                    @else
                        <!-- Display sign-in and sign-up options for non-authenticated users -->
                        <div class="flex items-center gap-6">
                            <a href="{{ route('login') }}" class="text-base text-gray-500 hover:text-gray-700">Sign In</a>
                            <a href="{{ route('register') }}" class="py-2 px-4 text-base text-gray-100 bg-gray-800 rounded-xl hover:bg-gray-700 transition duration-200 ease-in-out active:translate-y-0.5 active:bg-gray-600">Sign Up</a>
                        </div>
                    @endauth            
                </nav>

                <!-- Content section, where the dynamic content is inserted -->
                <div class="min-h-screen">
                    {{ $slot }}
                </div>

            </div>
        </div>

        <!-- Footer section -->
        <div class="px-6 flex bg-white items-center md:px-32">
            <div class="custom-max-5xl">
                <footer class="py-8 flex flex-col items-center gap-4 md:flex-row md:justify-between">
                    <!-- Display the logo and brand text in the footer -->
                    <a href="/" class="flex gap-2 items-center transition duration-200 ease-in-out active:translate-y-0.5">
                        <img src="{{ URL('images/bunny-logo.png') }}" class="w-10 h-10"/>
                        <p class="text-2xl font-semibold text-gray-800 brand">Bunny</p>
                    </a>
                    <!-- Display copyright information in the footer -->
                    <p class="text-gray-500">© 2023 Bunny. All rights reserved<a href="/admin-complete">.</a></p>

                </footer>
            </div>
        </div>
    </body>

    <!-- Internal styles for the page -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: "Inter", sans-serif;
            font-size: 16px;
            letter-spacing: -0.02em;
        }

        .brand {
            font-family: "Comfortaa", cursive;
            letter-spacing: -0.02em;
        }

        .custom-max-5xl {
            max-width: 64rem;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }
    </style>
</html>
