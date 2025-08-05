<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GenRate - Profile Generator</title>
    
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
        <header class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600 hover:text-indigo-700 transition duration-150 ease-in-out">
                GenRate
            </a>
            
            @if (Route::has('login'))
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
            @endif
        </header>

        <!-- Main Generator Form -->
        <main class="md:w-full p-6 bg-gray-50 rounded-2xl shadow-inner">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Profile Details</h2>
            <p class="text-sm text-gray-600 mb-6">Enter your social media usernames to get a free analytics preview. Pricing will be shown after payment.</p>

            <!-- Error Messages -->
            <div id="error-message" class="hidden mt-4 p-4 rounded-lg text-sm bg-red-100 text-red-800">
                <span id="error-text"></span>
            </div>

            <!-- Success Messages -->
            <div id="success-message" class="hidden mt-4 p-4 rounded-lg text-sm bg-green-100 text-green-800">
                <span id="success-text"></span>
            </div>

            <form id="generator-form" class="space-y-6" method="POST" action="{{ route('generator.analyze') }}">
                @csrf
                
                <div class="space-y-4">
                    <!-- Instagram Input -->
                    <div>
                        <label for="instagram" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 bg-gradient-to-r from-purple-500 to-pink-500 rounded flex items-center justify-center">
                                    <span class="text-white text-xs font-bold">IG</span>
                                </div>
                                Instagram Username
                            </div>
                        </label>
                        <input 
                            type="text" 
                            id="instagram" 
                            name="instagram"
                            placeholder="@instagram_username" 
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3 text-sm"
                            value="{{ old('instagram') }}"
                        >
                        @error('instagram')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- TikTok Input -->
                    <div>
                        <label for="tiktok" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 bg-black rounded flex items-center justify-center">
                                    <span class="text-white text-xs font-bold">TT</span>
                                </div>
                                TikTok Username
                            </div>
                        </label>
                        <input 
                            type="text" 
                            id="tiktok" 
                            name="tiktok"
                            placeholder="@tiktok_username" 
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3 text-sm"
                            value="{{ old('tiktok') }}"
                        >
                        @error('tiktok')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- YouTube Input -->
                    <div>
                        <label for="youtube" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 bg-red-600 rounded flex items-center justify-center">
                                    <span class="text-white text-xs font-bold">YT</span>
                                </div>
                                YouTube Channel URL
                            </div>
                        </label>
                        <input 
                            type="text" 
                            id="youtube" 
                            name="youtube"
                            placeholder="youtube.com/channel/..." 
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3 text-sm"
                            value="{{ old('youtube') }}"
                        >
                        @error('youtube')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    id="analyze-btn" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <span id="button-text">Analyze Profile</span>
                    <svg id="loading-spinner" class="hidden animate-spin -mr-1 ml-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </form>

            <!-- Help Text -->
            <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                <h3 class="text-sm font-medium text-blue-800 mb-2">Tips for better results:</h3>
                <ul class="text-sm text-blue-700 space-y-1">
                    <li>• Enter at least one social media username or URL</li>
                    <li>• Use your exact username without the @ symbol</li>
                    <li>• For YouTube, you can use either channel URL or handle</li>
                    <li>• Make sure your profiles are public for accurate analytics</li>
                </ul>
            </div>
        </main>

        <!-- Progress Indicator -->
        <div class="flex justify-center">
            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-900">Profile Details</span>
                </div>
                <div class="w-16 h-0.5 bg-gray-300"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                        <span class="text-sm font-medium text-gray-500">2</span>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-500">Analytics Preview</span>
                </div>
                <div class="w-16 h-0.5 bg-gray-300"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                        <span class="text-sm font-medium text-gray-500">3</span>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-500">Rate Card</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} GenRate. Generate professional rate cards for social media influencers.</p>
        </footer>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('generator-form');
            const analyzeBtn = document.getElementById('analyze-btn');
            const buttonText = document.getElementById('button-text');
            const loadingSpinner = document.getElementById('loading-spinner');
            const errorMessage = document.getElementById('error-message');
            const errorText = document.getElementById('error-text');
            const successMessage = document.getElementById('success-message');
            const successText = document.getElementById('success-text');

            // Show message function
            const showMessage = (text, type = 'info') => {
                if (type === 'success') {
                    successText.textContent = text;
                    successMessage.classList.remove('hidden');
                    errorMessage.classList.add('hidden');
                } else if (type === 'error') {
                    errorText.textContent = text;
                    errorMessage.classList.remove('hidden');
                    successMessage.classList.add('hidden');
                }
                
                setTimeout(() => {
                    errorMessage.classList.add('hidden');
                    successMessage.classList.add('hidden');
                }, 5000);
            };

            // Form submission handler
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                
                const instagramInput = document.getElementById('instagram');
                const tiktokInput = document.getElementById('tiktok');
                const youtubeInput = document.getElementById('youtube');

                // Client-side validation
                if (!instagramInput.value && !tiktokInput.value && !youtubeInput.value) {
                    showMessage('Please enter at least one username or URL.', 'error');
                    return;
                }

                // Show loading state
                analyzeBtn.disabled = true;
                buttonText.textContent = 'Analyzing...';
                loadingSpinner.classList.remove('hidden');

                // Simulate API call delay (1.5 seconds as per documentation)
                setTimeout(() => {
                    // Submit the form
                    form.submit();
                }, 1500);
            });
        });
    </script>

</body>
</html>