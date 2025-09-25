<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeeEdit extends Component
{
    use WithFileUploads;

    public Employee $employee;
    public $employee_number;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $date_of_birth;
    public $gender;
    public $address;
    public $city;
    public $state;
    public $postal_code;
    public $country = 'Indonesia';
    public $national_id;
    public $hire_date;
    public $department_id;
    public $position_id;
    public $manager_id;
    public $employment_status;
    public $employment_type;
    public $profile_photo;
    public $new_profile_photo;

    public $departments;
    public $positions;
    public $managers;

    protected $rules = [
        'employee_number' => 'required|string|max:50|unique:employees,employee_number',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:employees,email',
        'phone' => 'nullable|string|max:20',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|in:male,female,other',
        'address' => 'nullable|string',
        'city' => 'nullable|string|max:100',
        'state' => 'nullable|string|max:100',
        'postal_code' => 'nullable|string|max:20',
        'country' => 'required|string|max:100',
        'national_id' => 'nullable|string|max:50',
        'hire_date' => 'required|date',
        'department_id' => 'required|exists:departments,id',
        'position_id' => 'required|exists:positions,id',
        'manager_id' => 'nullable|exists:employees,id',
        'employment_status' => 'required|in:active,inactive,terminated,resigned',
        'employment_type' => 'required|in:permanent,contract,intern,freelance',
        'new_profile_photo' => 'nullable|image|max:2048',
    ];

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
        
        // Load relationships
        $this->employee->load(['department', 'position', 'manager']);
        
        // Populate form fields
        $this->employee_number = $employee->employee_number;
        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->email = $employee->email;
        $this->phone = $employee->phone;
        $this->date_of_birth = $employee->date_of_birth?->format('Y-m-d');
        $this->gender = $employee->gender;
        $this->address = $employee->address;
        $this->city = $employee->city;
        $this->state = $employee->state;
        $this->postal_code = $employee->postal_code;
        $this->country = $employee->country;
        $this->national_id = $employee->national_id;
        $this->hire_date = $employee->hire_date->format('Y-m-d');
        $this->department_id = $employee->department_id;
        $this->position_id = $employee->position_id;
        $this->manager_id = $employee->manager_id;
        $this->employment_status = $employee->employment_status;
        $this->employment_type = $employee->employment_type;
        $this->profile_photo = $employee->profile_photo;

        // Load dropdown data
        $this->departments = Department::where('is_active', true)->get();
        $this->positions = Position::where('is_active', true)->get();
        $this->managers = Employee::where('employment_status', 'active')
            ->where('id', '!=', $employee->id)
            ->get();
    }

    public function updatedDepartmentId()
    {
        $this->positions = Position::where('department_id', $this->department_id)
            ->where('is_active', true)
            ->get();
        $this->position_id = null;
    }

    public function save()
    {
        // Update validation rules to exclude current employee
        $this->rules['employee_number'] = 'required|string|max:50|unique:employees,employee_number,' . $this->employee->id;
        $this->rules['email'] = 'required|email|max:255|unique:employees,email,' . $this->employee->id;

        $this->validate();

        // Handle profile photo upload
        if ($this->new_profile_photo) {
            // Delete old photo if exists
            if ($this->employee->profile_photo) {
                Storage::disk('public')->delete($this->employee->profile_photo);
            }
            
            $this->profile_photo = $this->new_profile_photo->store('profile-photos', 'public');
        }

        // Update employee
        $this->employee->update([
            'employee_number' => $this->employee_number,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'country' => $this->country,
            'national_id' => $this->national_id,
            'hire_date' => $this->hire_date,
            'department_id' => $this->department_id,
            'position_id' => $this->position_id,
            'manager_id' => $this->manager_id,
            'employment_status' => $this->employment_status,
            'employment_type' => $this->employment_type,
            'profile_photo' => $this->profile_photo,
        ]);

        session()->flash('message', 'Employee updated successfully!');
        return redirect()->route('employees.show', $this->employee);
    }

    public function render()
    {
        return view('livewire.employee-edit');
    }
}
