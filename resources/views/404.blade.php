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
        <title>404: Page Not Found | Bunny</title>
    </head>

    <body>
        <!-- Main container with padding and alignment -->
        <div class="px-6 flex flex-col bg-gray-100 items-center md:px-32">
            <div class="custom-max-5xl">
                <!-- Navigation section -->
                <nav class="py-8 flex justify-between items-center">
                    <a href="/" class="flex gap-2 items-center transition duration-200 ease-in-out active:translate-y-0.5">
                        <img src="{{ URL('images/bunny-logo.png') }}" class="w-10 h-10"/>
                        <p class="text-2xl font-semibold text-gray-800 brand">Bunny</p>
                    </a>   
                </nav>

                <div class="min-h-screen">
                    <div>  
                        <div class="flex flex-col justify-center items-center h-full text-center">
                            <h1 class="text-6xl md:text-8xl mb-4 md:mb-6 text-gray-400 brand">404</h1>
                            <h1 class="text-4xl md:text-5xl mb-8 md:mb-12 font-medium text-gray-700">Oh no... We lost this page</h1>
                            <div class="mb-8 md:mb-12">
                                <img src="{{ URL('images/bunny-404.gif') }}" class="max-w-48 rounded-lg shadow-md"/>
                            </div>
                            <p class="text-gray-500 mb-6">We searched everywhere but couldn't find what you're looking for.
                                <br>Let's go back to the <a href="/" class="text-blue-600 hover:underline hover:text-blue-700">home page.</a>
                            </p>
                            <a href="/"
                                class="bg-gray-800 text-gray-100 border px-8 py-2 rounded-lg focus:outline-none shadow hover:bg-gray-200 hover:text-gray-800 hover:shadow-md hover:border-gray-300 hover:border transition duration-200 ease-in-out active:translate-y-0.5 text-center">
                                Back to Home
                            </a>
                        </div>
                    </div>
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
                    <p class="text-gray-500">© 2023 Bunny. All rights reserved.</p>
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
