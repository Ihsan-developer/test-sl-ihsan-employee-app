<?php

namespace App\Livewire;

use App\Models\Attendance;
use Carbon\Carbon;
use Livewire\Component;

class EmployeeDashboard extends Component
{
    public function render()
    {
        $employee = auth()->user()->employee;

        // Get today's attendance
        $todayAttendance = Attendance::where('employee_id', $employee->id)
            ->whereDate('date', today())
            ->first();

        // Get this month's attendance stats
        $thisMonthAttendance = Attendance::where('employee_id', $employee->id)
            ->whereYear('date', now()->year)
            ->whereMonth('date', now()->month)
            ->get();

        $presentDays = $thisMonthAttendance->where('status', 'present')->count();
        $lateDays = $thisMonthAttendance->where('status', 'late')->count();
        $totalWorkHours = $thisMonthAttendance->sum('work_hours');

        // Get recent attendance (last 7 days)
        $recentAttendance = Attendance::where('employee_id', $employee->id)
            ->orderBy('date', 'desc')
            ->limit(7)
            ->get();

        return view('livewire.employee-dashboard', [
            'employee' => $employee,
            'todayAttendance' => $todayAttendance,
            'presentDays' => $presentDays,
            'lateDays' => $lateDays,
            'totalWorkHours' => round($totalWorkHours, 2),
            'recentAttendance' => $recentAttendance,
        ]);
    }
}
