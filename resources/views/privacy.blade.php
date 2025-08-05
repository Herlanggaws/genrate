<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Privacy Policy - GenRate</title>
    
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
                <a href="{{ route('terms') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition duration-150 ease-in-out">
                    Terms of Use
                </a>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="prose prose-lg max-w-none">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Privacy Policy</h1>
            
            <div class="text-sm text-gray-500 mb-8">Last updated: {{ date('F j, Y') }}</div>

            <div class="space-y-6 text-gray-700">
                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">1. Information We Collect</h2>
                    <p>We collect information you provide directly to us, such as when you use our rate card generation service. This may include:</p>
                    <ul class="list-disc pl-6 space-y-2 mt-3">
                        <li>Social media profile information (Instagram, TikTok, YouTube usernames or URLs)</li>
                        <li>Session data to maintain your progress through our service</li>
                        <li>Usage data and analytics to improve our service</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">2. How We Use Your Information</h2>
                    <p>We use the information we collect to:</p>
                    <ul class="list-disc pl-6 space-y-2 mt-3">
                        <li>Provide and maintain our rate card generation service</li>
                        <li>Analyze social media profiles to generate pricing recommendations</li>
                        <li>Improve our service and develop new features</li>
                        <li>Communicate with you about our service</li>
                        <li>Ensure the security and integrity of our platform</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">3. Information Sharing</h2>
                    <p>We do not sell, trade, or otherwise transfer your personal information to third parties. We may share your information only in the following circumstances:</p>
                    <ul class="list-disc pl-6 space-y-2 mt-3">
                        <li>With your explicit consent</li>
                        <li>To comply with legal obligations</li>
                        <li>To protect our rights and safety</li>
                        <li>With service providers who assist in operating our platform (under strict confidentiality agreements)</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">4. Data Security</h2>
                    <p>We implement appropriate security measures to protect your information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet is 100% secure, and we cannot guarantee absolute security.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">5. Cookies and Tracking</h2>
                    <p>We use cookies and similar tracking technologies to enhance your experience on our website. These technologies help us:</p>
                    <ul class="list-disc pl-6 space-y-2 mt-3">
                        <li>Remember your preferences and settings</li>
                        <li>Analyze how our service is used</li>
                        <li>Improve our website functionality</li>
                    </ul>
                    <p class="mt-3">You can control cookie settings through your browser preferences.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">6. Third-Party Services</h2>
                    <p>Our service may integrate with third-party platforms (Instagram, TikTok, YouTube) to analyze social media profiles. These platforms have their own privacy policies, and we encourage you to review them.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">7. Data Retention</h2>
                    <p>We retain your information only for as long as necessary to provide our service and fulfill the purposes outlined in this policy. Session data is typically deleted after a reasonable period of inactivity.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">8. Your Rights</h2>
                    <p>You have the right to:</p>
                    <ul class="list-disc pl-6 space-y-2 mt-3">
                        <li>Access the personal information we hold about you</li>
                        <li>Request correction of inaccurate information</li>
                        <li>Request deletion of your personal information</li>
                        <li>Withdraw consent for data processing</li>
                        <li>Lodge a complaint with relevant data protection authorities</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">9. Children's Privacy</h2>
                    <p>Our service is not intended for children under 13 years of age. We do not knowingly collect personal information from children under 13. If you are a parent or guardian and believe your child has provided us with personal information, please contact us.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">10. Changes to This Policy</h2>
                    <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date.</p>
                </section>

                <section>
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">11. Contact Us</h2>
                    <p>If you have any questions about this Privacy Policy, please contact us at:</p>
                    <div class="mt-2 p-4 bg-gray-50 rounded-lg">
                        <p class="font-medium">Email: privacy@genrate.com</p>
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