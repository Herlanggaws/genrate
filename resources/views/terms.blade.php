<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terms of Use - GenRate</title>
    
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
<body class="bg-gray-100 min-h-screen p-4">

    <div class="container mx-auto p-8 bg-white rounded-3xl shadow-xl">

        <!-- Header Section -->
        <header class="flex justify-between items-center mb-8">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600 hover:text-indigo-700 transition duration-150 ease-in-out">
                GenRate
            </a>
            <nav class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition duration-150 ease-in-out">
                    Home
                </a>
                <a href="{{ route('privacy') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition duration-150 ease-in-out">
                    Privacy Policy
                </a>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="prose prose-lg max-w-none">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Terms of Use</h1>
            
            <div class="text-sm text-gray-500 mb-8">Last updated: {{ date('F j, Y') }}</div>

            <div class="space-y-6 text-gray-700">
                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">1. Acceptance of Terms</h2>
                    <p>By accessing and using GenRate ("the Service"), you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">2. Description of Service</h2>
                    <p>GenRate is a web-based platform that generates professional rate cards for social media influencers and content creators. The service analyzes social media profiles and provides pricing recommendations for various content creation services.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">3. User Responsibilities</h2>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>You are responsible for providing accurate and truthful information about your social media profiles.</li>
                        <li>You must not use the service for any illegal or unauthorized purpose.</li>
                        <li>You agree not to attempt to gain unauthorized access to any part of the service.</li>
                        <li>You are responsible for maintaining the confidentiality of any account information.</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">4. Intellectual Property</h2>
                    <p>The service and its original content, features, and functionality are and will remain the exclusive property of GenRate and its licensors. The service is protected by copyright, trademark, and other laws.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">5. Privacy and Data</h2>
                    <p>Your privacy is important to us. Please review our Privacy Policy, which also governs your use of the service, to understand our practices regarding the collection and use of your information.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">6. Disclaimers</h2>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>The rate card recommendations provided are estimates based on available data and should not be considered as guaranteed pricing.</li>
                        <li>We do not guarantee the accuracy, completeness, or usefulness of any information provided.</li>
                        <li>The service is provided "as is" without any warranties of any kind.</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">7. Limitation of Liability</h2>
                    <p>In no event shall GenRate, nor its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">8. Changes to Terms</h2>
                    <p>We reserve the right to modify or replace these terms at any time. If a revision is material, we will try to provide at least 30 days notice prior to any new terms taking effect.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">9. Contact Information</h2>
                    <p>If you have any questions about these Terms of Use, please contact us at:</p>
                    <div class="mt-2 p-4 bg-gray-50 rounded-lg">
                        <p class="font-medium">Email: support@genrate.com</p>
                        <p class="text-sm text-gray-600">We will respond to your inquiry within 48 hours.</p>
                    </div>
                </section>
            </div>
        </main>

        <!-- Footer -->
        <footer class="text-center text-sm text-gray-500 mt-12 pt-8 border-t border-gray-200">
            <p>&copy; {{ date('Y') }} GenRate. All rights reserved.</p>
        </footer>

    </div>

</body>
</html> 