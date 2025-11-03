<?php

namespace App\Livewire;

use App\Models\Attendance;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeAttendance extends Component
{
    use WithPagination;

    public $todayAttendance;
    public $currentTime;

    public function mount()
    {
        $this->loadTodayAttendance();
        $this->currentTime = now()->format('H:i:s');
    }

    public function loadTodayAttendance()
    {
        $employee = auth()->user()->employee;

        $this->todayAttendance = Attendance::where('employee_id', $employee->id)
            ->whereDate('date', today())
            ->first();
    }

    public function clockIn()
    {
        $employee = auth()->user()->employee;

        // Check if already clocked in today
        if ($this->todayAttendance && $this->todayAttendance->clock_in) {
            session()->flash('error', 'You have already clocked in today.');
            return;
        }

        $now = now();
        $clockInTime = $now->format('H:i:s');

        // Check if late (assuming 9:00 AM is start time)
        $isLate = $now->greaterThan($now->copy()->setTime(9, 0));

        Attendance::updateOrCreate(
            [
                'employee_id' => $employee->id,
                'date' => today(),
            ],
            [
                'clock_in' => $clockInTime,
                'status' => $isLate ? 'late' : 'present',
            ]
        );

        $this->loadTodayAttendance();
        session()->flash('success', 'Clocked in successfully at ' . $clockInTime);
    }

    public function clockOut()
    {
        if (!$this->todayAttendance || !$this->todayAttendance->clock_in) {
            session()->flash('error', 'You must clock in first.');
            return;
        }

        if ($this->todayAttendance->clock_out) {
            session()->flash('error', 'You have already clocked out today.');
            return;
        }

        $clockOutTime = now()->format('H:i:s');

        // Calculate work hours
        $clockIn = Carbon::parse($this->todayAttendance->clock_in);
        $clockOut = Carbon::parse($clockOutTime);
        $workHours = $clockOut->diffInMinutes($clockIn) / 60;

        $this->todayAttendance->update([
            'clock_out' => $clockOutTime,
            'work_hours' => round($workHours, 2),
        ]);

        $this->loadTodayAttendance();
        session()->flash('success', 'Clocked out successfully at ' . $clockOutTime);
    }

    public function render()
    {
        $employee = auth()->user()->employee;

        $attendances = Attendance::where('employee_id', $employee->id)
            ->orderBy('date', 'desc')
            ->paginate(15);

        return view('livewire.employee-attendance', [
            'attendances' => $attendances,
        ]);
    }
}
