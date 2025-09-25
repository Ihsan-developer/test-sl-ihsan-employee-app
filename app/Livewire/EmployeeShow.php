<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EmployeeShow extends Component
{
    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee->load(['department', 'position', 'manager', 'currentSalary']);
    }

    public function render()
    {
        return view('livewire.employee-show');
    }
}
