<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">My Attendance</h1>
        <p class="text-gray-600 dark:text-gray-400">Track your daily attendance</p>
    </div>

    @if (session()->has('success'))
        <div class="mb-4 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
            <p class="text-sm text-green-800 dark:text-green-200">{{ session('success') }}</p>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-4 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
            <p class="text-sm text-red-800 dark:text-red-200">{{ session('error') }}</p>
        </div>
    @endif

    <!-- Clock In/Out Card -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl shadow-xl p-8 mb-6">
        <div class="grid md:grid-cols-3 gap-6 text-white">
            <div>
                <p class="text-blue-100 text-sm mb-2">Current Time</p>
                <p class="text-3xl font-bold">{{ now()->format('H:i') }}</p>
                <p class="text-blue-100 text-sm">{{ now()->format('l, F j, Y') }}</p>
            </div>

            <div>
                @if($todayAttendance && $todayAttendance->clock_in)
                    <p class="text-blue-100 text-sm mb-2">Clocked In</p>
                    <p class="text-3xl font-bold">{{ \Carbon\Carbon::parse($todayAttendance->clock_in)->format('H:i') }}</p>
                    <p class="text-blue-100 text-sm">
                        Status:
                        <span class="px-2 py-1 rounded {{ $todayAttendance->status === 'late' ? 'bg-red-500' : 'bg-green-500' }}">
                            {{ ucfirst($todayAttendance->status) }}
                        </span>
                    </p>
                @else
                    <p class="text-blue-100 text-sm mb-2">Not Clocked In</p>
                    <p class="text-2xl font-bold">--:--</p>
                @endif
            </div>

            <div>
                @if($todayAttendance && $todayAttendance->clock_out)
                    <p class="text-blue-100 text-sm mb-2">Clocked Out</p>
                    <p class="text-3xl font-bold">{{ \Carbon\Carbon::parse($todayAttendance->clock_out)->format('H:i') }}</p>
                    <p class="text-blue-100 text-sm">Work Hours: {{ $todayAttendance->work_hours }}h</p>
                @else
                    <p class="text-blue-100 text-sm mb-2">Clock Out</p>
                    <p class="text-2xl font-bold">--:--</p>
                @endif
            </div>
        </div>

        <div class="mt-6 flex gap-4">
            @if(!$todayAttendance || !$todayAttendance->clock_in)
                <button
                    wire:click="clockIn"
                    class="px-6 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition-all shadow-lg"
                >
                    Clock In
                </button>
            @elseif(!$todayAttendance->clock_out)
                <button
                    wire:click="clockOut"
                    class="px-6 py-3 bg-white text-purple-600 rounded-lg font-semibold hover:bg-gray-100 transition-all shadow-lg"
                >
                    Clock Out
                </button>
            @else
                <div class="px-6 py-3 bg-green-500 text-white rounded-lg font-semibold">
                    ✓ Completed for today
                </div>
            @endif
        </div>
    </div>

    <!-- Attendance History -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Attendance History</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-900">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Clock In</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Clock Out</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Work Hours</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($attendances as $attendance)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                {{ $attendance->date->format('M d, Y') }}
                                <span class="text-gray-500">({{ $attendance->date->format('l') }})</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                {{ $attendance->clock_in ? \Carbon\Carbon::parse($attendance->clock_in)->format('H:i') : '--:--' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                {{ $attendance->clock_out ? \Carbon\Carbon::parse($attendance->clock_out)->format('H:i') : '--:--' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                {{ $attendance->work_hours ? $attendance->work_hours . 'h' : '--' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                    @if($attendance->status === 'present') bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200
                                    @elseif($attendance->status === 'late') bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200
                                    @elseif($attendance->status === 'absent') bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200
                                    @elseif($attendance->status === 'sick') bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200
                                    @elseif($attendance->status === 'leave') bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200
                                    @else bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200
                                    @endif">
                                    {{ ucfirst($attendance->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                No attendance records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
            {{ $attendances->links() }}
        </div>
    </div>
</div>
