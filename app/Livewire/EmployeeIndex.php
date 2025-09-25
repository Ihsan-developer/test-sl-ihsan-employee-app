<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $departmentFilter = '';
    public $positionFilter = '';
    public $statusFilter = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'departmentFilter' => ['except' => ''],
        'positionFilter' => ['except' => ''],
        'statusFilter' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingDepartmentFilter()
    {
        $this->resetPage();
    }

    public function updatingPositionFilter()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function deleteEmployee($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();
        
        session()->flash('message', 'Employee deleted successfully.');
    }

    public function render()
    {
        $employees = Employee::with(['department', 'position', 'manager'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('first_name', 'like', '%' . $this->search . '%')
                      ->orWhere('last_name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('employee_number', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->departmentFilter, function ($query) {
                $query->where('department_id', $this->departmentFilter);
            })
            ->when($this->positionFilter, function ($query) {
                $query->where('position_id', $this->positionFilter);
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('employment_status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $departments = Department::where('is_active', true)->get();
        $positions = Position::where('is_active', true)->get();

        return view('livewire.employee-index', [
            'employees' => $employees,
            'departments' => $departments,
            'positions' => $positions,
        ]);
    }
}
