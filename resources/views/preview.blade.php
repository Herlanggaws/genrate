<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GenRate - Analytics Preview</title>
    
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
            max-width: 1200px;
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

        <!-- Main Preview Content -->
        <main class="space-y-6">
            <div class="text-center p-4">
                <h2 class="text-3xl font-bold text-gray-800">Your Analytics Preview</h2>
                <p class="text-gray-600">This is a summary of your profile's performance. Pricing is hidden.</p>
            </div>

            <!-- Profile Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $userProfiles = session('user_profiles', []);
                    
                    // Mock data generation function
                    function generateMockData($platform, $username) {
                        $placeholders = [
                            'instagram' => "https://placehold.co/120x120/5d4090/ffffff?text=IG",
                            'tiktok' => "https://placehold.co/120x120/000000/ffffff?text=TT",
                            'youtube' => "https://placehold.co/120x120/FF0000/ffffff?text=YT"
                        ];
                        
                        return [
                            'profileImage' => $placeholders[$platform],
                            'followers' => number_format(rand(10000, 150000)),
                            'engagementRate' => number_format(rand(200, 1000) / 100, 2),
                            'audience' => "60% Female, 40% Male | 25-34 Age Group | Top Locations: Jakarta, Surabaya",
                            'username' => $username,
                            'platform' => $platform
                        ];
                    }
                @endphp

                @if(!empty($userProfiles['instagram']))
                    @php $data = generateMockData('instagram', $userProfiles['instagram']); @endphp
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-200">
                        <div class="flex items-center space-x-4 mb-4">
                            <img src="{{ $data['profileImage'] }}" class="w-16 h-16 rounded-full" alt="Instagram Profile">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $data['username'] }}</h3>
                                <p class="text-sm text-gray-500 flex items-center gap-1">
                                    <div class="w-4 h-4 bg-gradient-to-r from-purple-500 to-pink-500 rounded flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">IG</span>
                                    </div>
                                    Instagram
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-center">
                            <div>
                                <p class="text-3xl font-bold text-indigo-600">{{ $data['followers'] }}</p>
                                <span class="text-sm text-gray-600">Followers</span>
                            </div>
                            <div>
                                <p class="text-3xl font-bold text-indigo-600">{{ $data['engagementRate'] }}%</p>
                                <span class="text-sm text-gray-600">Engagement Rate</span>
                            </div>
                        </div>
                        <div class="mt-4 text-sm text-gray-600">
                            <p class="font-semibold">Audience:</p>
                            <p>{{ $data['audience'] }}</p>
                        </div>
                    </div>
                @endif

                @if(!empty($userProfiles['tiktok']))
                    @php $data = generateMockData('tiktok', $userProfiles['tiktok']); @endphp
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-200">
                        <div class="flex items-center space-x-4 mb-4">
                            <img src="{{ $data['profileImage'] }}" class="w-16 h-16 rounded-full" alt="TikTok Profile">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $data['username'] }}</h3>
                                <p class="text-sm text-gray-500 flex items-center gap-1">
                                    <div class="w-4 h-4 bg-black rounded flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">TT</span>
                                    </div>
                                    TikTok
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-center">
                            <div>
                                <p class="text-3xl font-bold text-indigo-600">{{ $data['followers'] }}</p>
                                <span class="text-sm text-gray-600">Followers</span>
                            </div>
                            <div>
                                <p class="text-3xl font-bold text-indigo-600">{{ $data['engagementRate'] }}%</p>
                                <span class="text-sm text-gray-600">Engagement Rate</span>
                            </div>
                        </div>
                        <div class="mt-4 text-sm text-gray-600">
                            <p class="font-semibold">Audience:</p>
                            <p>{{ $data['audience'] }}</p>
                        </div>
                    </div>
                @endif

                @if(!empty($userProfiles['youtube']))
                    @php $data = generateMockData('youtube', $userProfiles['youtube']); @endphp
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-200">
                        <div class="flex items-center space-x-4 mb-4">
                            <img src="{{ $data['profileImage'] }}" class="w-16 h-16 rounded-full" alt="YouTube Channel">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $data['username'] }}</h3>
                                <p class="text-sm text-gray-500 flex items-center gap-1">
                                    <div class="w-4 h-4 bg-red-600 rounded flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">YT</span>
                                    </div>
                                    YouTube
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-center">
                            <div>
                                <p class="text-3xl font-bold text-indigo-600">{{ $data['followers'] }}</p>
                                <span class="text-sm text-gray-600">Subscribers</span>
                            </div>
                            <div>
                                <p class="text-3xl font-bold text-indigo-600">{{ $data['engagementRate'] }}%</p>
                                <span class="text-sm text-gray-600">Engagement Rate</span>
                            </div>
                        </div>
                        <div class="mt-4 text-sm text-gray-600">
                            <p class="font-semibold">Audience:</p>
                            <p>{{ $data['audience'] }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Call to Action Section -->
            <div class="p-6 bg-gray-50 rounded-2xl shadow-inner text-center">
                <p class="text-xl font-semibold text-gray-800 mb-4">Ready to see your pricing?</p>
                <a 
                    href="{{ route('payment') }}"
                    class="inline-block py-3 px-8 text-lg font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Unlock Full Rate Card (Simulated Payment)
                </a>
            </div>

            <!-- Analytics Insights -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <div class="bg-blue-50 p-6 rounded-xl">
                    <h3 class="text-lg font-semibold text-blue-800 mb-3">Performance Insights</h3>
                    <ul class="text-sm text-blue-700 space-y-2">
                        <li>• Your engagement rates are above industry average</li>
                        <li>• Peak posting times: 7-9 PM local time</li>
                        <li>• Your audience is highly engaged with video content</li>
                        <li>• Brand collaboration potential: High</li>
                    </ul>
                </div>
                
                <div class="bg-green-50 p-6 rounded-xl">
                    <h3 class="text-lg font-semibold text-green-800 mb-3">Growth Opportunities</h3>
                    <ul class="text-sm text-green-700 space-y-2">
                        <li>• Cross-platform promotion can increase reach by 40%</li>
                        <li>• Story content shows 25% higher engagement</li>
                        <li>• Collaboration posts perform 60% better</li>
                        <li>• Video content gets 3x more engagement</li>
                    </ul>
                </div>
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
                <div class="w-16 h-0.5 bg-indigo-600"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-900">Analytics Preview</span>
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

</body>
</html>