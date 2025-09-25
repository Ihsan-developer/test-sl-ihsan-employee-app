<div>
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Employee Details</h1>
                <p class="text-gray-600 dark:text-gray-400">View employee information</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('employees.edit', $employee) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                    <span class="text-sm mr-2">✏️</span>
                    Edit Employee
                </a>
                <a href="{{ route('employees.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-medium py-2 px-4 rounded-lg flex items-center">
                    <span class="text-sm mr-2">⬅️</span>
                    Back to Employees
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Employee Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="text-center">
                    @if($employee->profile_photo)
                        <img src="{{ Storage::url($employee->profile_photo) }}" 
                             alt="{{ $employee->full_name }}" 
                             class="w-32 h-32 rounded-full mx-auto object-cover mb-4">
                    @else
                        <div class="w-32 h-32 rounded-full bg-gray-200 dark:bg-gray-700 mx-auto mb-4 flex items-center justify-center">
                            <span class="text-4xl font-bold text-gray-600 dark:text-gray-400">
                                {{ substr($employee->first_name, 0, 1) }}{{ substr($employee->last_name, 0, 1) }}
                            </span>
                        </div>
                    @endif
                    
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $employee->full_name }}</h2>
                    <p class="text-gray-600 dark:text-gray-400">{{ $employee->position->title }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-500">{{ $employee->department->name }}</p>
                    
                    <div class="mt-4">
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full 
                            {{ $employee->employment_status === 'active' ? 'bg-green-100 text-green-800' : 
                               ($employee->employment_status === 'inactive' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($employee->employment_status) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employee Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Personal Information -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Personal Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Employee Number</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->employee_number }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Email</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->email }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Phone</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->phone ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Date of Birth</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->date_of_birth ? $employee->date_of_birth->format('M d, Y') : 'Not provided' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Gender</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->gender ? ucfirst($employee->gender) : 'Not provided' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">National ID</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->national_id ?? 'Not provided' }}</p>
                    </div>
                </div>
            </div>

            <!-- Employment Information -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Employment Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Hire Date</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->hire_date->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Employment Type</label>
                        <p class="text-gray-900 dark:text-white">{{ ucfirst($employee->employment_type) }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Department</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->department->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Position</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->position->title }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Manager</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->manager ? $employee->manager->full_name : 'No manager assigned' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Years of Service</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->hire_date->diffInYears(now()) }} years</p>
                    </div>
                </div>
            </div>

            <!-- Address Information -->
            @if($employee->address || $employee->city || $employee->state)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Address Information</h3>
                <div class="space-y-2">
                    @if($employee->address)
                        <p class="text-gray-900 dark:text-white">{{ $employee->address }}</p>
                    @endif
                    @if($employee->city || $employee->state || $employee->postal_code)
                        <p class="text-gray-900 dark:text-white">
                            {{ $employee->city }}{{ $employee->city && $employee->state ? ', ' : '' }}{{ $employee->state }} {{ $employee->postal_code }}
                        </p>
                    @endif
                    <p class="text-gray-900 dark:text-white">{{ $employee->country }}</p>
                </div>
            </div>
            @endif

            <!-- Current Salary -->
            @if($employee->currentSalary)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Current Salary</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Base Salary</label>
                        <p class="text-gray-900 dark:text-white">{{ number_format($employee->currentSalary->base_salary, 0, ',', '.') }} {{ $employee->currentSalary->currency }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Allowances</label>
                        <p class="text-gray-900 dark:text-white">{{ number_format($employee->currentSalary->allowances, 0, ',', '.') }} {{ $employee->currentSalary->currency }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Effective Date</label>
                        <p class="text-gray-900 dark:text-white">{{ $employee->currentSalary->effective_date->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>