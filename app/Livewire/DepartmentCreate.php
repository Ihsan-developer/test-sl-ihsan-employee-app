<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Employee;
use Livewire\Component;

class DepartmentCreate extends Component
{
    public $departmentId = null;
    public $name = '';
    public $code = '';
    public $description = '';
    public $manager_id = null;
    public $is_active = true;

    protected $queryString = ['edit'];

    public function mount()
    {
        if (request()->has('edit')) {
            $this->departmentId = request()->get('edit');
            $department = Department::find($this->departmentId);

            if ($department) {
                $this->name = $department->name;
                $this->code = $department->code;
                $this->description = $department->description;
                $this->manager_id = $department->manager_id;
                $this->is_active = $department->is_active;
            }
        }
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:departments,code,' . $this->departmentId,
            'description' => 'nullable|string',
            'manager_id' => 'nullable|exists:employees,id',
            'is_active' => 'boolean',
        ];
    }

    public function save()
    {
        $this->validate();

        if ($this->departmentId) {
            // Update existing department
            $department = Department::find($this->departmentId);
            $department->update([
                'name' => $this->name,
                'code' => $this->code,
                'description' => $this->description,
                'manager_id' => $this->manager_id,
                'is_active' => $this->is_active,
            ]);

            session()->flash('success', 'Department updated successfully.');
        } else {
            // Create new department
            Department::create([
                'name' => $this->name,
                'code' => $this->code,
                'description' => $this->description,
                'manager_id' => $this->manager_id,
                'is_active' => $this->is_active,
            ]);

            session()->flash('success', 'Department created successfully.');
        }

        return redirect()->route('departments.index');
    }

    public function render()
    {
        $employees = Employee::select('id', 'first_name', 'last_name')
            ->where('employment_status', 'active')
            ->orderBy('first_name')
            ->get();

        return view('livewire.department-create', [
            'employees' => $employees,
        ]);
    }
}
