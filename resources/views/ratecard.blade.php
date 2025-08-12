<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GenRate - Your Professional Rate Card</title>
    
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
        @media print {
            body { background-color: white; }
            .no-print { display: none; }
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="container mx-auto p-8 bg-white rounded-3xl shadow-xl flex flex-col gap-8">

        <!-- Header Section -->
        <header class="flex justify-between items-center no-print">
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

        <!-- Main Rate Card Content -->
        <main class="space-y-8">
            <div class="text-center p-6">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Your Complete Rate Card</h1>
                <p class="text-gray-600">Congratulations! Here is your personalized rate card with pricing.</p>
                <p class="text-sm text-gray-500 mt-2">Generated on {{ date('F j, Y') }}</p>
            </div>

            <!-- Profile Analytics Cards -->
            <section>
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Social Media Analytics</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $userProfiles = session('user_profiles', []);
                        
                        // Mock data generation function (same as preview page)
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
            </section>

            <!-- Service Pricing Section -->
            <section class="mt-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-indigo-200 pb-2">Service Pricing</h2>
                
                @php
                    // Pricing generation function
                    function generatePricingTable($platform) {
                        $platformNames = [
                            'instagram' => 'Instagram',
                            'tiktok' => 'TikTok',
                            'youtube' => 'YouTube'
                        ];
                        
                        $singlePost = rand(200, 1000);
                        $story = rand(100, 400);
                        $package = rand(800, 2500);
                        
                        return [
                            'platform' => $platformNames[$platform],
                            'singlePost' => number_format($singlePost),
                            'story' => number_format($story),
                            'package' => number_format($package)
                        ];
                    }
                @endphp

                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">
                    @if(!empty($userProfiles['instagram']))
                        @php $pricing = generatePricingTable('instagram'); @endphp
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-2xl border border-purple-200">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                                <div class="w-6 h-6 bg-gradient-to-r from-purple-500 to-pink-500 rounded flex items-center justify-center">
                                    <span class="text-white text-xs font-bold">IG</span>
                                </div>
                                {{ $pricing['platform'] }} Pricing
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
                                    <span class="text-sm font-medium text-gray-700">Single Post / Video</span>
                                    <span class="text-indigo-600 font-bold text-lg">${{ $pricing['singlePost'] }}</span>
                                </div>
                                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
                                    <span class="text-sm font-medium text-gray-700">Story / Reel</span>
                                    <span class="text-indigo-600 font-bold text-lg">${{ $pricing['story'] }}</span>
                                </div>
                                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
                                    <span class="text-sm font-medium text-gray-700">Package Deal (3 Posts)</span>
                                    <span class="text-indigo-600 font-bold text-lg">${{ $pricing['package'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(!empty($userProfiles['tiktok']))
                        @php $pricing = generatePricingTable('tiktok'); @endphp
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-6 rounded-2xl border border-gray-300">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                                <div class="w-6 h-6 bg-black rounded flex items-center justify-center">
                                    <span class="text-white text-xs font-bold">TT</span>
                                </div>
                                {{ $pricing['platform'] }} Pricing
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
                                    <span class="text-sm font-medium text-gray-700">Single Video</span>
                                    <span class="text-indigo-600 font-bold text-lg">${{ $pricing['singlePost'] }}</span>
                                </div>
                                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
                                    <span class="text-sm font-medium text-gray-700">Short Form Content</span>
                                    <span class="text-indigo-600 font-bold text-lg">${{ $pricing['story'] }}</span>
                                </div>
                                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
                                    <span class="text-sm font-medium text-gray-700">Package Deal (3 Videos)</span>
                                    <span class="text-indigo-600 font-bold text-lg">${{ $pricing['package'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(!empty($userProfiles['youtube']))
                        @php $pricing = generatePricingTable('youtube'); @endphp
                        <div class="bg-gradient-to-br from-red-50 to-red-100 p-6 rounded-2xl border border-red-200">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                                <div class="w-6 h-6 bg-red-600 rounded flex items-center justify-center">
                                    <span class="text-white text-xs font-bold">YT</span>
                                </div>
                                {{ $pricing['platform'] }} Pricing
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
                                    <span class="text-sm font-medium text-gray-700">Sponsored Video</span>
                                    <span class="text-indigo-600 font-bold text-lg">${{ $pricing['singlePost'] }}</span>
                                </div>
                                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
                                    <span class="text-sm font-medium text-gray-700">YouTube Shorts</span>
                                    <span class="text-indigo-600 font-bold text-lg">${{ $pricing['story'] }}</span>
                                </div>
                                <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
                                    <span class="text-sm font-medium text-gray-700">Package Deal (3 Videos)</span>
                                    <span class="text-indigo-600 font-bold text-lg">${{ $pricing['package'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            <!-- Additional Services -->
            <section class="mt-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Additional Services</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-blue-50 p-6 rounded-xl border border-blue-200">
                        <h4 class="text-lg font-semibold text-blue-800 mb-3">Content Creation</h4>
                        <ul class="text-sm text-blue-700 space-y-2">
                            <li>• Custom photography: $150-300 per session</li>
                            <li>• Video editing: $100-200 per video</li>
                            <li>• Graphic design: $50-150 per design</li>
                            <li>• Content strategy consultation: $200/hour</li>
                        </ul>
                    </div>
                    
                    <div class="bg-green-50 p-6 rounded-xl border border-green-200">
                        <h4 class="text-lg font-semibold text-green-800 mb-3">Campaign Management</h4>
                        <ul class="text-sm text-green-700 space-y-2">
                            <li>• Multi-platform campaigns: +25% premium</li>
                            <li>• Long-term partnerships: 10% discount</li>
                            <li>• Rush delivery (24-48h): +50% premium</li>
                            <li>• Analytics reporting: $100 per campaign</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Download and Actions -->
            <section class="mt-12 text-center no-print">
                <div class="bg-gray-50 p-8 rounded-2xl">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Ready to share your rate card?</h3>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <button 
                            id="download-btn"
                            class="py-3 px-8 text-lg font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Download as PDF (Simulated)
                        </button>
                        <a 
                            href="{{ route('generator') }}"
                            class="py-3 px-8 text-lg font-semibold text-indigo-600 bg-white border-2 border-indigo-600 rounded-lg hover:bg-indigo-50 transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Create Another Rate Card
                        </a>
                    </div>
                </div>
            </section>

            <!-- Success Message (Hidden by default) -->
            <div id="success-message" class="hidden mt-6 p-4 rounded-lg text-sm bg-green-100 text-green-800 no-print">
                <div class="flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>PDF download simulated successfully!</span>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="mt-12 text-center text-gray-500 text-sm border-t pt-6">
                <p class="font-medium mb-2">Important Disclaimer</p>
                <p>This is a sample rate card generated for demonstration purposes. Actual rates may vary based on campaign details, brand requirements, usage rights, and negotiation. All pricing shown is for reference only and should be adjusted based on your specific market conditions and business needs.</p>
            </div>
        </main>

        <!-- Footer -->
        <footer class="text-center text-sm text-gray-500 no-print">
            <p>&copy; {{ date('Y') }} GenRate. Generate professional rate cards for social media influencers.</p>
        </footer>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const downloadBtn = document.getElementById('download-btn');
            const successMessage = document.getElementById('success-message');

            downloadBtn.addEventListener('click', () => {
                // Show success message
                successMessage.classList.remove('hidden');
                
                // Simulate PDF generation delay
                downloadBtn.disabled = true;
                downloadBtn.textContent = 'Generating PDF...';
                
                setTimeout(() => {
                    downloadBtn.disabled = false;
                    downloadBtn.textContent = 'Download as PDF (Simulated)';
                    
                    // Hide success message after 3 seconds
                    setTimeout(() => {
                        successMessage.classList.add('hidden');
                    }, 3000);
                }, 2000);
            });
        });
    </script>
    
    <!-- Include TikTok SDK fix -->
    @include('partials.tiktok-sdk-fix')
    
</body>
</html>