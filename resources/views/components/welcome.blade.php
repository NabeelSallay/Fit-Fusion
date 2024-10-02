<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit Fusion</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 10rem; /* Adjust top padding to make the window appear bigger */
        }
        .text-white {
            color: #ffffff; /* Set font color to white */
        }
        .logo-text {
            font-size: 3rem; /* Increase font size for "Fit Fusion" */
        }
        .slogan {
            font-size: 0.8rem; /* Adjust font size for slogan */
        }
        /* Additional styles for the button */
        .oval-button {
            border-radius: 50px; /* Make the button more oval-shaped */
            background-color: #000000; /* Set background color to black */
        }
        .oval-button:hover {
            background-color: #333333; /* Darken the background color on hover */
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

<!-- Main content area with background image -->
{{--<div class="bg-cover bg-center bg-no-repeat py-32" style="background-image: url('{{ asset('images/background.jpg') }}');">--}}
{{--    <div class="max-w-7xl mx-auto px-6 lg:px-8">--}}
{{--        <div class="text-center">--}}
{{--            <img src="{{ asset('images/background.png') }}" alt="Fit Fusion Logo" class="block mx-auto mb-8 w-32 h-auto" />--}}
{{--            <h1 class="font-quantico text-4xl font-bold text-white mb-4">--}}
{{--                <span class="logo-text">Fit Fusion</span><br>--}}
{{--                <span class="slogan">Be Yourself</span>--}}
{{--            </h1>--}}
{{--            <a href="#" class="inline-block mt-6 px-8 py-3 oval-button text-white rounded hover:bg-gray-800">Learn More</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<main class="relative">
    <div class="relative h-screen bg-cover bg-center" style="background-image: url('{{ asset('Images/background.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="container mx-auto h-full flex items-center justify-center text-center">
            <div class="relative text-white bg-opacity-70 p-8 text-shadow-lg rounded-lg">
                <h1 class="text-5xl font-bold">Search. Explore. Find Your Home</h1>
            </div>
        </div>
    </div>
</main>

</body>
</html>
