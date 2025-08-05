<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GenRate - Generate Professional Rate Cards</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: "Inter", ui-sans-serif, system-ui, sans-serif;
            background-color: #f3f4f6;
        }
        .container {
            max-width: 900px;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="container mx-auto p-8 bg-white rounded-3xl shadow-xl flex flex-col gap-8">

        <!-- Header Section -->
        @if (Route::has('login'))
            <header class="flex justify-end">
                <nav class="flex items-center gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-150 ease-in-out"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition duration-150 ease-in-out"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-lg hover:bg-indigo-700 transition duration-150 ease-in-out"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            </header>
        @endif

        <!-- Main Landing Content -->
        <main class="text-center p-6 bg-gray-50 rounded-2xl shadow-inner">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-4">GenRate</h1>
            <p class="text-lg text-gray-600 mb-8">Generate professional rate cards for your social media profiles.</p>
            
            <a
                href="{{ route('generator') }}"
                class="inline-block py-3 px-8 text-lg font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Generate My Rate Card
            </a>
        </main>

        <!-- Features Section -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="text-center p-6 bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Analytics Preview</h3>
                <p class="text-sm text-gray-600">Get insights into your social media performance across platforms</p>
            </div>

            <div class="text-center p-6 bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Professional Pricing</h3>
                <p class="text-sm text-gray-600">Generate market-competitive rates for your content and services</p>
            </div>

            <div class="text-center p-6 bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Export Ready</h3>
                <p class="text-sm text-gray-600">Download your rate card as PDF to share with potential clients</p>
            </div>
        </section>

        <!-- Supported Platforms -->
        <section class="text-center mt-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Supported Platforms</h2>
            <div class="flex justify-center items-center gap-8">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center">
                        <span class="text-white text-xs font-bold">IG</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Instagram</span>
                </div>
                
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-black rounded-lg flex items-center justify-center">
                        <span class="text-white text-xs font-bold">TT</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700">TikTok</span>
                </div>
                
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center">
                        <span class="text-white text-xs font-bold">YT</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700">YouTube</span>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center text-sm text-gray-500 mt-8">
            <p>&copy; {{ date('Y') }} GenRate. Generate professional rate cards for social media influencers.</p>
        </footer>

    </div>

    <!-- No JavaScript needed for simple link navigation -->

</body>
</html>
