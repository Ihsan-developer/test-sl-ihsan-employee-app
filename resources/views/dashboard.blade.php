<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <!-- Welcome Header -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl shadow-xl p-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Welcome back, {{ auth()->user()->name }}!</h1>
                    <p class="text-blue-100">Here's what's happening with your team today.</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Employees Card -->
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-all hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg shadow-blue-500/50 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full">
                        All
                    </span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Total Employees</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ \App\Models\Employee::count() }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-2">
                        <span class="text-green-600 font-semibold">+12%</span> from last month
                    </p>
                </div>
            </div>

            <!-- Active Employees Card -->
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 hover:border-green-500 dark:hover:border-green-500 transition-all hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center shadow-lg shadow-green-500/50 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-full">
                        Active
                    </span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Active Employees</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ \App\Models\Employee::where('employment_status', 'active')->count() }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-2">
                        <span class="text-green-600 font-semibold">{{ number_format((\App\Models\Employee::where('employment_status', 'active')->count() / max(\App\Models\Employee::count(), 1)) * 100, 1) }}%</span> of total
                    </p>
                </div>
            </div>

            <!-- Departments Card -->
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 hover:border-purple-500 dark:hover:border-purple-500 transition-all hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg shadow-purple-500/50 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <a href="{{ route('departments.index') }}" class="text-xs font-semibold text-purple-600 hover:text-purple-700 dark:text-purple-400">
                        View all →
                    </a>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Departments</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ \App\Models\Department::where('is_active', true)->count() }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-2">
                        Across organization
                    </p>
                </div>
            </div>

            <!-- Positions Card -->
            <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 hover:border-orange-500 dark:hover:border-orange-500 transition-all hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center shadow-lg shadow-orange-500/50 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <a href="{{ route('positions.index') }}" class="text-xs font-semibold text-orange-600 hover:text-orange-700 dark:text-orange-400">
                        View all →
                    </a>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Open Positions</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ \App\Models\Position::where('is_active', true)->count() }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-2">
                        Available roles
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Quick Actions - Takes 1 column -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Quick Actions
                    </h3>
                    <div class="space-y-3">
                        <a href="{{ route('employees.create') }}" class="w-full group flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 hover:from-blue-100 hover:to-blue-200 dark:hover:from-blue-900/30 dark:hover:to-blue-800/30 rounded-lg transition-all border border-blue-200 dark:border-blue-800">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-white">Add Employee</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>

                        <a href="{{ route('employees.index') }}" class="w-full group flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-all border border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-white">View Employees</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>

                        <a href="{{ route('departments.index') }}" class="w-full group flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-all border border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-white">Departments</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>

                        <a href="{{ route('positions.index') }}" class="w-full group flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-all border border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-white">Positions</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Activity - Takes 2 columns -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Recent Employees
                    </h3>
                    <div class="space-y-3">
                        @php
                            $recentEmployees = \App\Models\Employee::with(['department', 'position'])
                                ->orderBy('created_at', 'desc')
                                ->limit(5)
                                ->get();
                        @endphp

                        @forelse($recentEmployees as $employee)
                            <a href="{{ route('employees.show', $employee) }}" class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-all group border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center flex-shrink-0 shadow-lg">
                                    <span class="text-lg font-bold text-white">
                                        {{ substr($employee->first_name, 0, 1) }}{{ substr($employee->last_name, 0, 1) }}
                                    </span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white truncate group-hover:text-blue-600 transition-colors">
                                        {{ $employee->first_name }} {{ $employee->last_name }}
                                    </p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 truncate">
                                        {{ $employee->position->title }} • {{ $employee->department->name }}
                                    </p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $employee->employment_status === 'active' ? 'bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400' : 'bg-gray-100 text-gray-600 dark:bg-gray-900/30 dark:text-gray-400' }}">
                                        {{ ucfirst($employee->employment_status) }}
                                    </span>
                                    <span class="text-xs text-gray-400 whitespace-nowrap">
                                        {{ $employee->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </a>
                        @empty
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 mx-auto text-gray-300 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">No employees yet. Start building your team!</p>
                                <a href="{{ route('employees.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all shadow-lg shadow-blue-500/50">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add Your First Employee
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Department Distribution -->
        @if(\App\Models\Department::count() > 0)
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Employee Distribution by Department
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach(\App\Models\Department::withCount('employees')->where('is_active', true)->orderBy('employees_count', 'desc')->limit(8)->get() as $dept)
                    <div class="p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-mono font-bold text-gray-500 dark:text-gray-400">{{ $dept->code }}</span>
                            <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $dept->employees_count }}</span>
                        </div>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 truncate">{{ $dept->name }}</p>
                        <div class="mt-2 w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-gradient-to-r from-blue-600 to-purple-600 h-2 rounded-full" style="width: {{ min(($dept->employees_count / max(\App\Models\Employee::count(), 1)) * 100, 100) }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</x-layouts.app>
