<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Management System - Home</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-blue-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen">
    <!-- Navigation -->
    <nav class="w-full bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Employee App
                    </span>
                </div>

                <!-- Auth Links -->
                @if (Route::has('login'))
                    <div class="flex items-center space-x-2 sm:space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-3 sm:px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-3 sm:px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 sm:px-6 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all shadow-lg shadow-blue-500/50">
                                    Get Started
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-12 sm:py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-6 sm:space-y-8">
                    <div class="inline-flex items-center px-3 sm:px-4 py-2 bg-blue-50 dark:bg-blue-900/20 rounded-full border border-blue-200 dark:border-blue-800">
                        <svg class="w-4 h-4 text-blue-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-xs sm:text-sm font-medium text-blue-600 dark:text-blue-400">Modern HR Management Solution</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white leading-tight">
                        Manage Your
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent block sm:inline">
                            Workforce
                        </span>
                        Efficiently
                    </h1>

                    <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-300 leading-relaxed">
                        Streamline employee management, track departments, manage positions, and boost productivity with our comprehensive employee management system.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-8 py-4 text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all shadow-lg shadow-blue-500/50 text-center">
                                Start Free Trial
                            </a>
                        @endif
                        <a href="#features" class="px-8 py-4 text-base font-semibold text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:border-blue-600 dark:hover:border-blue-400 transition-all text-center">
                            Learn More
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 sm:gap-8 pt-8">
                        <div>
                            <div class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">500+</div>
                            <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Active Users</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">99%</div>
                            <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Satisfaction</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">24/7</div>
                            <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">Support</div>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Illustration -->
                <div class="relative mt-8 lg:mt-0">
                    <div class="relative rounded-2xl bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900/20 dark:to-purple-900/20 p-6 sm:p-8 backdrop-blur-sm border border-gray-200 dark:border-gray-700">
                        <div class="space-y-4">
                            <!-- Mock Dashboard Card -->
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 sm:p-6 shadow-xl">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-xs sm:text-sm font-medium text-gray-600 dark:text-gray-400">Employee Overview</span>
                                    <span class="px-2 sm:px-3 py-1 text-xs font-semibold text-green-600 bg-green-100 dark:bg-green-900/30 rounded-full">Active</span>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <div class="w-8 sm:w-10 h-8 sm:h-10 bg-blue-100 dark:bg-blue-900/30 rounded-full mr-3 flex-shrink-0"></div>
                                        <div class="flex-1 min-w-0">
                                            <div class="h-2 sm:h-3 bg-gray-200 dark:bg-gray-700 rounded w-3/4"></div>
                                            <div class="h-1.5 sm:h-2 bg-gray-100 dark:bg-gray-800 rounded w-1/2 mt-2"></div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-8 sm:w-10 h-8 sm:h-10 bg-purple-100 dark:bg-purple-900/30 rounded-full mr-3 flex-shrink-0"></div>
                                        <div class="flex-1 min-w-0">
                                            <div class="h-2 sm:h-3 bg-gray-200 dark:bg-gray-700 rounded w-2/3"></div>
                                            <div class="h-1.5 sm:h-2 bg-gray-100 dark:bg-gray-800 rounded w-1/3 mt-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mock Stats -->
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white dark:bg-gray-800 rounded-lg p-3 sm:p-4 shadow-xl">
                                    <div class="text-xl sm:text-2xl font-bold text-blue-600">142</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Employees</div>
                                </div>
                                <div class="bg-white dark:bg-gray-800 rounded-lg p-3 sm:p-4 shadow-xl">
                                    <div class="text-xl sm:text-2xl font-bold text-purple-600">12</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Departments</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Elements -->
                    <div class="absolute -top-6 -right-6 w-20 sm:w-24 h-20 sm:h-24 bg-blue-500 rounded-full opacity-20 blur-2xl animate-pulse"></div>
                    <div class="absolute -bottom-6 -left-6 w-24 sm:w-32 h-24 sm:h-32 bg-purple-500 rounded-full opacity-20 blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-12 sm:py-20 px-4 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Everything You Need to Manage Your Team
                </h2>
                <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Powerful features designed to simplify HR management and boost productivity
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Feature 1 -->
                <div class="group p-6 bg-gray-50 dark:bg-gray-900 rounded-xl hover:shadow-xl transition-all border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white mb-2">Employee Management</h3>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400">Track and manage employee information, records, and performance all in one place.</p>
                </div>

                <!-- Feature 2 -->
                <div class="group p-6 bg-gray-50 dark:bg-gray-900 rounded-xl hover:shadow-xl transition-all border border-gray-200 dark:border-gray-700 hover:border-purple-500 dark:hover:border-purple-500">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform flex-shrink-0">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white mb-2">Department Structure</h3>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400">Organize your company with hierarchical department structures and management.</p>
                </div>

                <!-- Feature 3 -->
                <div class="group p-6 bg-gray-50 dark:bg-gray-900 rounded-xl hover:shadow-xl transition-all border border-gray-200 dark:border-gray-700 hover:border-green-500 dark:hover:border-green-500">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white mb-2">Position Management</h3>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400">Define roles, responsibilities, and salary ranges for every position in your company.</p>
                </div>

                <!-- Feature 4 -->
                <div class="group p-6 bg-gray-50 dark:bg-gray-900 rounded-xl hover:shadow-xl transition-all border border-gray-200 dark:border-gray-700 hover:border-orange-500 dark:hover:border-orange-500">
                    <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform flex-shrink-0">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white mb-2">Analytics & Reports</h3>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400">Get insights with detailed reports and analytics on your workforce.</p>
                </div>

                <!-- Feature 5 -->
                <div class="group p-6 bg-gray-50 dark:bg-gray-900 rounded-xl hover:shadow-xl transition-all border border-gray-200 dark:border-gray-700 hover:border-red-500 dark:hover:border-red-500">
                    <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform flex-shrink-0">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white mb-2">Secure & Compliant</h3>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400">Enterprise-grade security with role-based access control and data encryption.</p>
                </div>

                <!-- Feature 6 -->
                <div class="group p-6 bg-gray-50 dark:bg-gray-900 rounded-xl hover:shadow-xl transition-all border border-gray-200 dark:border-gray-700 hover:border-indigo-500 dark:hover:border-indigo-500">
                    <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform flex-shrink-0">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white mb-2">Lightning Fast</h3>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400">Built with modern technology for blazing fast performance and real-time updates.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-12 sm:py-20 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 sm:p-12 shadow-2xl">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                    Ready to Transform Your HR Management?
                </h2>
                <p class="text-lg sm:text-xl text-blue-100 mb-8">
                    Join hundreds of companies already using Employee App
                </p>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-block px-6 sm:px-8 py-3 sm:py-4 text-base sm:text-lg font-semibold text-blue-600 bg-white rounded-lg hover:bg-gray-100 transition-all shadow-lg">
                        Get Started Now
                    </a>
                @endif
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-8 sm:py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="sm:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-white">Employee App</span>
                    </div>
                    <p class="text-sm sm:text-base text-gray-400 max-w-md">
                        Modern employee management system built with Laravel and Livewire. Streamline your HR processes today.
                    </p>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm sm:text-base">
                        <li><a href="#features" class="hover:text-white transition-colors">Features</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Login</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="hover:text-white transition-colors">Register</a></li>
                        @endif
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2 text-sm sm:text-base">
                        <li>support@employeeapp.com</li>
                        <li>+1 (555) 123-4567</li>
                        <li>123 Business St, City</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm">
                <p>&copy; {{ date('Y') }} EmployeeApp. All rights reserved. Built with Laravel {{ app()->version() }}</p>
            </div>
        </div>
    </footer>
</body>
</html>
