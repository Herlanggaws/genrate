<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GenRate - Payment</title>
    
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
            max-width: 800px;
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

        <!-- Payment Content -->
        <main class="text-center p-8 bg-white rounded-2xl shadow-lg border border-gray-200">
            <div class="mb-6">
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Complete Your Payment</h2>
                <p class="text-gray-600 mb-8">This is a simulation of the Xendit payment gateway. Click below to continue.</p>
            </div>

            <!-- Payment Summary -->
            <div class="bg-gray-50 rounded-xl p-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Order Summary</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">GenRate Professional Rate Card</span>
                        <span class="font-semibold text-gray-800">$29.99</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Analytics Report</span>
                        <span class="font-semibold text-gray-800">$9.99</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Processing Fee</span>
                        <span class="font-semibold text-gray-800">$2.99</span>
                    </div>
                    <hr class="border-gray-300">
                    <div class="flex justify-between items-center text-lg font-bold">
                        <span class="text-gray-800">Total</span>
                        <span class="text-indigo-600">$42.97</span>
                    </div>
                </div>
            </div>

            <!-- Simulated Payment Gateway -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 mb-8 border border-blue-200">
                <div class="flex items-center justify-center mb-4">
                    <div class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold text-sm">
                        Powered by Xendit
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="text-left">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Card Number</label>
                        <input 
                            type="text" 
                            placeholder="4111 1111 1111 1111" 
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            disabled
                        >
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-left">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Expiry Date</label>
                            <input 
                                type="text" 
                                placeholder="12/25" 
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                disabled
                            >
                        </div>
                        <div class="text-left">
                            <label class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                            <input 
                                type="text" 
                                placeholder="123" 
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                disabled
                            >
                        </div>
                    </div>
                    
                    <div class="text-left">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cardholder Name</label>
                        <input 
                            type="text" 
                            placeholder="John Doe" 
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            disabled
                        >
                    </div>
                </div>
                
                <p class="text-xs text-gray-500 mt-4">
                    🔒 This is a simulation. No actual payment will be processed.
                </p>
            </div>

            <!-- Payment Button -->
            <div class="flex justify-center">
                <button 
                    id="pay-btn" 
                    class="py-4 px-8 text-lg font-semibold text-white bg-emerald-600 rounded-lg shadow-md hover:bg-emerald-700 transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <span id="pay-button-text">Simulate Successful Payment</span>
                    <svg id="pay-loading-spinner" class="hidden animate-spin -mr-1 ml-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>

            <!-- Success Message (Hidden by default) -->
            <div id="success-message" class="hidden mt-6 p-4 rounded-lg text-sm bg-green-100 text-green-800">
                <div class="flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span id="success-text">Payment successful! Redirecting to your rate card...</span>
                </div>
            </div>

            <!-- Security Features -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600">
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span>SSL Encrypted</span>
                </div>
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>PCI Compliant</span>
                </div>
                <div class="flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Money Back Guarantee</span>
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
                <div class="w-16 h-0.5 bg-indigo-600"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center">
                        <span class="text-sm font-medium text-white">3</span>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-900">Payment</span>
                </div>
                <div class="w-16 h-0.5 bg-gray-300"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                        <span class="text-sm font-medium text-gray-500">4</span>
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
            const payBtn = document.getElementById('pay-btn');
            const payButtonText = document.getElementById('pay-button-text');
            const payLoadingSpinner = document.getElementById('pay-loading-spinner');
            const successMessage = document.getElementById('success-message');
            const successText = document.getElementById('success-text');

            payBtn.addEventListener('click', () => {
                // Show loading state
                payBtn.disabled = true;
                payButtonText.textContent = 'Processing Payment...';
                payLoadingSpinner.classList.remove('hidden');

                // Simulate payment processing (2 seconds as per documentation)
                setTimeout(() => {
                    // Show success message
                    successMessage.classList.remove('hidden');
                    payBtn.style.display = 'none';
                    
                    // Redirect after another 2 seconds
                    setTimeout(() => {
                        window.location.href = '{{ route("ratecard") }}';
                    }, 2000);
                }, 2000);
            });
        });
    </script>

</body>
</html>